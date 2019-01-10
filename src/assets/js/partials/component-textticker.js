import $ from 'jquery';


const Textticker = {
    init() {
        this.cacheDom()
        this.mainTextTicker()
    },
    cacheDom() {

    },
    mainTextTicker() {
    //hér er fyrir orða ticker
        // (function() {
            var delete_speed, letters, next_delay, next_ticker, split, text_delete, text_write, write_speed;

            write_speed = 100;

            delete_speed = 50;

            next_delay = 1000;

            letters = '';

            split = function() {
            $('.ticker_item').each(function() {
                var i, text, words;
                i = void 0;
                text = void 0;
                words = void 0;
                words = $(this).text().split('');
                for (i in words) {
                i = i;
                // if (window.CP.shouldStopExecution(1)) {
                //   break;
                // }
                i = i;
                words[i] = '<span>' + words[i] + '</span>';
                }
                // window.CP.exitedLoop(1);
                text = words.join('');
                $(this).html(text);
            });
            };

            next_ticker = function() {
            if ($('.current_ticker').is(':last-child')) {
                $('.current_ticker').removeClass('current_ticker').addClass('delete_ticker');
                $('.first_ticker').addClass('current_ticker');
            } else {
                $('.current_ticker').removeClass('current_ticker').addClass('delete_ticker').next().addClass('current_ticker');
            }
            setTimeout((function() {
                $('.delete_ticker').appendTo('.ticker').removeClass('delete_ticker');
                text_write();
            }), 40);
            };

            text_delete = function() {
            setTimeout((function() {
                var text_delete_timer;
                text_delete_timer = setInterval((function() {
                if (letters > 0) {
                    $('.current_ticker span:nth-of-type(' + letters + ')').css('display', 'none');
                    letters--;
                } else {
                    clearInterval(text_delete_timer);
                    next_ticker();
                }
                }), delete_speed);
            }), next_delay);
            };

            text_write = function() {
            var count, text_write_timer;
            count = 0;
            letters = $('.current_ticker span').length;
            text_write_timer = setInterval((function() {
                if (count - 1 < letters) {
                $('.current_ticker span:nth-of-type(' + count + ')').css('display', 'inline');
                count++;
                } else {
                clearInterval(text_write_timer);
                text_delete();
                }
            }), write_speed);
            };

            split();

            text_write();

        // }).call(this);


    }
}

module.exports = Textticker
