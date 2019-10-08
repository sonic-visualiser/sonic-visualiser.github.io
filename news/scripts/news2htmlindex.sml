
fun newsFilesIn dir =
    let open OS.FileSys
        fun from dirstream =
            case readDir dirstream of
                NONE => []
              | SOME file =>
                if String.size file > 0
                   andalso Char.isDigit (String.sub (file, 0))
                   andalso String.isSuffix ".txt" file
                then file :: from dirstream
                else from dirstream
        val stream = openDir dir
        val files = from stream
        val _ = closeDir stream
    in
        files
    end

fun fileContents filename =
    let val stream = TextIO.openIn filename
        fun trim str =
            hd (String.fields (fn x => x = #"\n" orelse x = #"\r") str)
        fun read str acc =
            case TextIO.inputLine str of
                SOME line => read str (trim line :: acc)
              | NONE => rev acc
        val contents = read stream []
        val _ = TextIO.closeIn stream
    in
        String.concatWith "\n" contents
    end

datatype place =
         TOP_LEVEL |
         IN_LIST

fun inElement e text =
    "<" ^ e ^ ">" ^ text ^ "</" ^ e ^ ">";

fun closeFor place =
    case place of
        TOP_LEVEL => ""
      | IN_LIST => "</ul>"

fun processHeading (para, (place, acc)) =
    let open String
        val level = if isPrefix "==== " para then 2
                    else if isPrefix "=== " para then 3
                    else if isPrefix "== " para then 4
                    else raise Fail ("Unsupported header level indicator in \""
                                     ^ para ^ "\"")
        val text = extract (para, 7 - level, NONE)
    in
        (TOP_LEVEL,
         (closeFor place ^
          inElement ("h" ^ Int.toString level) text) :: acc)
    end

fun processParagraph (para, (place, acc)) =
    let open String
    in
        if isPrefix " - " para
        then (IN_LIST, (case place of
                            TOP_LEVEL => "<ul>"
                          | IN_LIST => "") ^
                       inElement "li" (extract (para, 3, NONE)) :: acc)
        else if isPrefix "=" para
        then processHeading (para, (place, acc))
        else (TOP_LEVEL, (closeFor place ^ inElement "p" para) :: acc)
    end                         

fun processNewsFile file =
    let val contents = fileContents file
        val lines = String.fields (fn x => x = #"\n") contents
        val paragraphs =
            case (foldl (fn (line, (p, pp)) =>
                            if line = ""
                            then ([], String.concatWith "\n" (rev p) :: pp)
                            else (line :: p, pp)) ([], []) lines) of
                ([], pp) => rev pp
              | (p, pp) => rev (String.concatWith "\n" (rev p) :: pp)
    in
        case foldl processParagraph (TOP_LEVEL, []) paragraphs of
            (place, paras) =>
            String.concatWith "\n" (rev paras) ^ closeFor place
    end
        
fun processNews files = 
    String.concatWith "\n" (map processNewsFile files)

fun insertIntoTemplate templateName content =
    let val template = fileContents templateName
        val lines = String.fields (fn c => c = #"\n") template
        val inserted =
            map (fn line =>
                    if String.isSubstring "<!-- CONTENT HERE -->" line
                    then content
                    else line)
                lines
    in
        String.concatWith "\n" inserted
    end
                      
fun main() =
    let val files = ListMergeSort.sort String.< (newsFilesIn ".")
        val content = processNews files
        val html = insertIntoTemplate "template.html" content
        val outstream = TextIO.openOut "index.html"
    in
        TextIO.output (outstream, html);
        TextIO.closeOut outstream
    end
    handle exn =>
           (print ("Error: " ^ (exnMessage exn) ^ "\n");
            OS.Process.exit OS.Process.failure)

