;(function ($, window, document, undefined) {
    'use strict';
    function Paging(element, options) {
        this.element = element;
        this.options = {
            pageNum: options.pageNum || 1,
            totalNum: options.totalNum,
            totalList: options.totalList,
            callback: options.callback
        };
        this.init();
    }
    Paging.prototype = {
        constructor: Paging,
        init: function () {
            this.createHtml();
            this.bindEvent();
        },
        createHtml: function () {
            var me = this;
            var content = [];
            var pageNum = me.options.pageNum;
            var totalNum = me.options.totalNum;
            var totalList = me.options.totalList;
            content.push("<button type='button' id='firstPage'>首页</button><button type='button' id='prePage'>上一页</button>");

            if (totalNum > 6) {

                if (pageNum < 5) {

                    for (var i = 1; i < 6; i++) {
                        if (pageNum !== i) {
                            content.push("<button type='button'>" + i + "</button>");
                        } else {
                            content.push("<button type='button' class='current'>" + i + "</button>");
                        }
                    }
                    content.push(". . .");
                    content.push("<button type='button'>" + totalNum + "</button>");
                } else {

                    if (pageNum < totalNum - 3) {
                        for (var i = pageNum - 2; i < pageNum + 3; i++) {
                            if (pageNum !== i) {
                                content.push("<button type='button'>" + i + "</button>");
                            } else {
                                content.push("<button type='button' class='current'>" + i + "</button>");
                            }
                        }
                        content.push(". . .");
                        content.push("<button type='button'>" + totalNum + "</button>");
                    } else {

                        content.push("<button type='button'>" + 1 + "</button>");
                        content.push(". . .");
                        for (var i = totalNum - 4; i < totalNum + 1; i++) {
                            if (pageNum !== i) {
                                content.push("<button type='button'>" + i + "</button>");
                            } else {
                                content.push("<button type='button' class='current'>" + i + "</button>");
                            }
                        }
                    }
                }
            } else {
                // 总页数小于6
                for (var i = 1; i < totalNum + 1; i++) {
                    if (pageNum !== i) {
                        content.push("<button type='button'>" + i + "</button>");
                    } else {
                        content.push("<button type='button' class='current'>" + i + "</button>");
                    }
                }
            }
            content.push("<button type='button' id='nextPage'>下一页</button><button type='button' id='lastPage'>末页</button>");
            me.element.html(content.join(''));


            setTimeout(function () {
                me.dis();
            }, 20);
        },
        bindEvent: function () {
            var me = this;
            me.element.off('click', 'button');

            me.element.on('click', 'button', function () {
                var id = $(this).attr('id');
                var num = parseInt($(this).html());
                var pageNum = me.options.pageNum;
                if (id === 'prePage') {
                    if (pageNum !== 1) {
                        me.options.pageNum -= 1;
                    }
                } else if (id === 'nextPage') {
                    if (pageNum !== me.options.totalNum) {
                        me.options.pageNum += 1;
                    }
                } else if (id === 'firstPage') {
                    if (pageNum !== 1) {
                        me.options.pageNum = 1;
                    }
                } else if (id === 'lastPage') {
                    if (pageNum !== me.options.totalNum) {
                        me.options.pageNum = me.options.totalNum;
                    }
                } else {
                    me.options.pageNum = num;
                }
                me.createHtml();
                if (me.options.callback) {
                    me.options.callback(me.options.pageNum);
                }
            });
        },
        dis: function () {
            var me = this;
            var pageNum = me.options.pageNum;
            var totalNum = me.options.totalNum;
            if (pageNum === 1) {
                me.element.children('#firstPage, #prePage').prop('disabled', true);
            } else if (pageNum === totalNum) {
                me.element.children('#lastPage, #nextPage').prop('disabled', true);
            }
        }
    };
    $.fn.paging = function (options) {
        return new Paging($(this), options);
    }
})(jQuery, window, document);