/**
 * Denis
 * my.js(bugfix(codeview) summernote.js)
 */

String.prototype.escapeHTML = function() {
    return this.replace(/<span class="cm-tag cm-bracket">/g, "")
        .replace(/<span class="cm-tag">/g, "")
        .replace(/<span class="cm-tag cm-error">/g, "")
        .replace(/<span class="cm-tag cm-bracket cm-error">/g, "")
        .replace(/<span class="cm-string">/g, "")
        .replace(/<span class="cm-attribute">/g, "")
        .replace(/<span="" class="cm-attribute">/g, "")
        .replace(/<span cm-text="">/g, "")
        .replace(/<span>/g, "")
        .replace(/<\/span>/g, "")
        .replace(/&amp;/g, "&")
        .replace(/&lt;/g, "<")
        .replace(/&gt;/g, ">")
        .replace(/&quot;/g, '"')
        .replace(/&#039;/g, "'");
}

var save = function() {
    var mark = $('.CodeMirror-line span').html();
    if (mark !== null && mark !== undefined) {
        var value = mark.escapeHTML();

        if (value !== undefined) {
            $('.summernote > textarea').val(value);

            // $('.summernote > textarea').html(value);
        }
    }

};

// $('.click2edit').click(function() {
//     var ht = $('.summernote > textarea').html();
//     var hts = $('.summernote > textarea').val();
//
//     console.log(ht);
//     console.log(hts);
// });
// var onblur = function() {
//     var val = $('.note-editable > p').html(value);
//
//     if (value !== null && value !== undefined) {
//         $('.summernote > textarea').html(val);
//         $('.note-codable').html(val);
//     }
// }