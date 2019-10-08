
datatype place =
         TOP_LEVEL |
         IN_CHANGESET of TextIO.outstream |
         IN_CHANGE of TextIO.outstream

type state = TextIO.instream * place
             
fun trim str =
    hd (String.fields (fn x => x = #"\n" orelse x = #"\r") str)

fun isEmpty str =
    List.all Char.isSpace (explode str)

fun monthShortToNumeric m =
    case m of
        "Jan" => "01" | "Feb" => "02" | "Mar" => "03"
      | "Apr" => "04" | "May" => "05" | "Jun" => "06"
      | "Jul" => "07" | "Aug" => "08" | "Sep" => "09"
      | "Oct" => "10" | "Nov" => "11" | "Dec" => "12"
      | _ => raise Fail ("Unexpected month string \"" ^ m ^ "\"")

fun monthNumericToLong m =
    case m of
        "01" => "January" | "02" => "February" | "03" => "March"
      | "04" => "April" | "05" => "May" | "06" => "June"
      | "07" => "July" | "08" => "August" | "09" => "September"
      | "10" => "October" | "11" => "November" | "12" => "December"
      | _ => raise Fail ("Unexpected numeric month \"" ^ m ^ "\"")
                   
fun formalDate date =
    let fun shortMonth month =
            if String.size month > 3
            then String.substring (month, 0, 3)
            else month
    in
        case String.tokens (fn c => c = #" ") date of
            [month, year] =>
            let val monthNo = monthShortToNumeric (shortMonth month)
            in
                SOME (year ^ "-" ^ monthNo)
            end
          | _ => NONE
    end

fun textDate formal =
    case String.tokens (fn c => c = #"-") formal of
        [year, month, day] => day ^ " " ^ (monthNumericToLong month) ^
                              " " ^ year
      | [year, month] => (monthNumericToLong month) ^ " " ^ year
      | _ => raise Fail ("Unexpected formal date format " ^ formal)

fun newChangeset (line, old) =
    let val _ = case old of SOME old => TextIO.closeOut old
                          | NONE  => ()
        val dividedAtBrackets =
            String.tokens (fn c => c = #")" orelse c = #"(") line
        val dateMaybe = case dividedAtBrackets of
                            _::b::_::[] => formalDate b
                          | _ => NONE
        val dateString =
            case dateMaybe of
                SOME d => d
              | NONE => raise Fail ("Failed to get date from \"" ^ line ^ "\"")
        val (wordsBeforeBrackets, textAfterBrackets) =
            case dividedAtBrackets of
                a::_::c::[] => (String.tokens (fn c => c = #" ") a, c)
              | _ => raise Fail ("Failed to split line around date: \"" ^
                                 line ^ "\"")
        val (application, version, heading) =
            case rev wordsBeforeBrackets of
                [] => (NONE, NONE, NONE)
              | v::rest =>
                (case List.partition
                          (fn s => String.size s > 0
                                   andalso Char.isUpper (String.sub (s, 0))
                                   andalso s <> "Changes")
                          rest of
                     ([], _) => NONE
                   | (ww, _) => SOME (String.concatWith " " (rev ww)),
                 if String.isPrefix "v" v
                 then SOME v
                 else SOME ("v" ^ v),
                 SOME (String.concatWith " " (wordsBeforeBrackets) ^
                       textAfterBrackets)
                )
        val fileName =
            case version of
                SOME v => dateString ^ "-changes-" ^ v ^ ".txt"
              | NONE =>  dateString ^ "-changes.txt"
        val outstream = TextIO.openOut fileName
    in
        case (application, version, heading) of
            (SOME a, SOME v, SOME h) =>
            TextIO.output (outstream, "=== " ^ (textDate dateString) ^ " &mdash; " ^
                                      a ^ " " ^ v ^ " released\n\n" ^
                                      "== " ^ h ^ "\n")
          | _ =>
            TextIO.output (outstream, "=== " ^ (textDate dateString) ^ "\n" ^
                                      "== " ^ line ^ "\n");
        IN_CHANGESET outstream
    end
                 
fun processNewChange (instream, place) line : state =
    case place of
        TOP_LEVEL =>
        raise Fail ("Unexpected new change at top level: \"" ^ line ^ "\"")
      | IN_CHANGESET outstream =>
        (TextIO.output (outstream, "\n" ^ line ^ "\n");
         (instream, IN_CHANGE outstream))
      | IN_CHANGE _ => 
        raise Fail ("Unexpected new change within change: \"" ^ line ^ "\"")

fun processNewChangeset (instream, place) line : state =
    case place of
        TOP_LEVEL =>
        (instream, newChangeset (line, NONE))
      | IN_CHANGESET outstream =>
        (instream, newChangeset (line, SOME outstream))
      | IN_CHANGE _ => 
        raise Fail ("Unexpected new changeset within change: \"" ^ line ^ "\"")
             
fun processContinued (instream, place) line : state =
    case place of
        TOP_LEVEL => 
        raise Fail ("Unexpected continuation at top level: \"" ^ line ^ "\"")
      | IN_CHANGESET _ =>
        raise Fail ("Unexpected continuation in changeset: \"" ^ line ^ "\"")
      | IN_CHANGE outstream =>
        (TextIO.output (outstream, line ^ "\n");
         (instream, IN_CHANGE outstream))
             
fun processParagraph (instream, place) line : state =
    case place of
        TOP_LEVEL => 
        raise Fail ("Unexpected paragraph at top level: \"" ^ line ^ "\"")
      | IN_CHANGESET outstream =>
        (TextIO.output (outstream, "\n" ^ line ^ "\n");
         (instream, IN_CHANGESET outstream))
      | IN_CHANGE outstream =>
        raise Fail ("Unexpected paragraph within change: \"" ^ line ^ "\"")
             
fun processNonEmpty state line : state =
    (if String.isPrefix " - " line
     then processNewChange
     else if String.isPrefix " " line
     then processContinued
     else if String.isPrefix "Changes in " line
     then processNewChangeset
     else processParagraph)
        state line
       
fun processLine (instream, place) line : state =
    if not (isEmpty line)
    then processNonEmpty (instream, place) line
    else 
        case place of
            TOP_LEVEL => (instream, TOP_LEVEL)
          | IN_CHANGESET outstream => (instream, IN_CHANGESET outstream)
          | IN_CHANGE outstream => (instream, IN_CHANGESET outstream)
        
fun processChangelog (state as (instream, place)) =
    case TextIO.inputLine instream of
        SOME line => processChangelog
                         (processLine (instream, place) (trim line))
      | NONE =>
        (case place of
             TOP_LEVEL => ()
           | IN_CHANGESET outstream => TextIO.closeOut outstream
           | IN_CHANGE outstream =>  TextIO.closeOut outstream)
        
fun main() =
    let val instream = TextIO.stdIn
    in
        processChangelog (instream, TOP_LEVEL)
        handle exn =>
               (print ("Error: " ^ (exnMessage exn) ^ "\n");
                OS.Process.exit OS.Process.failure)
    end

