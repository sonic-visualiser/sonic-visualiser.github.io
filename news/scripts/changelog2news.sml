
datatype place =
         TOP_LEVEL |
         IN_CHANGESET of TextIO.outstream |
         IN_CHANGE of TextIO.outstream

type state = TextIO.instream * place
             
fun trim str =
    hd (String.fields (fn x => x = #"\n" orelse x = #"\r") str)

fun isEmpty str =
    List.all Char.isSpace (explode str)

fun formattedDate date =
    let fun shortMonth month =
            if String.size month > 3
            then String.substring (month, 0, 3)
            else month
    in
        case String.tokens (fn c => c = #" ") date of
            [month, year] =>
            let val monthNo = 
                    case shortMonth month of
                        "Jan" => "01" | "Feb" => "02" | "Mar" => "03"
                      | "Apr" => "04" | "May" => "05" | "Jun" => "06"
                      | "Jul" => "07" | "Aug" => "08" | "Sep" => "09"
                      | "Oct" => "10" | "Nov" => "11" | "Dec" => "12"
                      | _ => raise Fail ("Unexpected month string \""
                                         ^ month ^ "\"")
            in
                SOME (year ^ "-" ^ monthNo)
            end
          | _ => NONE
    end

fun newChangeset (line, old) =
    let val _ = case old of SOME old => TextIO.closeOut old
                          | NONE  => ()
        val parts = String.tokens (fn c => c = #")" orelse c = #"(") line
        val dateMaybe = case parts of
                            _::b::_::[] => formattedDate b
                          | _ => NONE
        val dateString =
            case dateMaybe of
                SOME d => d
              | NONE => raise Fail ("Failed to get date from \"" ^ line ^ "\"")
        val version =
            case parts of
                a::_::_::[] =>
                let val v = hd (rev (String.tokens (fn c => c = #" ") a))
                in
                    if String.isPrefix "v" v
                    then SOME v
                    else SOME ("v" ^ v)
                end
              | _ => NONE
        val fileName =
            case version of
                SOME v => "news/" ^ dateString ^ "-changes-" ^ v ^ ".txt"
              | NONE =>  "news/" ^ dateString ^ "-changes.txt"
        val outstream = TextIO.openOut fileName
    in
        TextIO.output (outstream, "== " ^ line ^ "\n");
        IN_CHANGESET outstream
    end
                 
fun processNewChange (instream, place) line : state =
    case place of
        TOP_LEVEL =>
        raise Fail ("Unexpected new change at top level: \"" ^ line ^ "\"")
      | IN_CHANGESET outstream =>
        (TextIO.output (outstream, line ^ "\n");
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
             
fun processNonEmpty state line : state =
    (if String.isPrefix " - " line
     then processNewChange
     else if String.isPrefix " " line
     then processContinued
     else processNewChangeset)
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

