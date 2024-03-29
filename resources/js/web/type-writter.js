function write(obj, sentence, i, cb) {
    if (i != sentence.length) {
        setTimeout(function () {
            i++
            obj.innerHTML = sentence.substr(0, i + 1) +' <em aria-hidden="true"></em>';
            write(obj, sentence, i, cb)
        }, 100)
    } else {
        cb()
    }
}

function erase(obj, cb, i) {
    var sentence = obj.innerText;
    if (sentence.length != 0) {
        setTimeout(function() {
            sentence = sentence.substr(0, sentence.length-1)
            obj.innerText = sentence;
            erase(obj, cb);
        }, 18 / (i * (i / 10000000)))
    } else {
        obj.innerText = " "
        cb()
    }
}

var typeline = document.querySelector("#typeline");

function writeErase(obj, sentence, time, cb) {
    write(obj, sentence, 0, function() {
        setTimeout(function() {
            erase(obj, cb) }, time) })
}
let currentLocalization = $('#current_localization').val();

if (currentLocalization === 'en') {
    var sentences = [
        "Key words: php, database,git...",
        "Key words: mysql, redis, memcached...",
    ];
} else if (currentLocalization === 'ua') {
    var sentences = [
        "Ключові слова: бекенд, php, database, git...",
        "Ключові слова: mysql, redis, memcached...",
    ]
} else {

}

var counter = 0;

function loop() {
    var sentence = sentences[counter % sentences.length]
    writeErase(typeline, sentence, 1500, loop)
    counter++
}

loop()
