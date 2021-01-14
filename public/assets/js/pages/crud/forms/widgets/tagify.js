var KTTagify = {
    init: function() {
        var e, a;
        ! function() {
            var e = document.getElementById("kt_tagify_1"),
                a = new Tagify(e, {
                    whitelist: [],
                    blacklist: []
                });
            document.getElementById("kt_tagify_1_remove").addEventListener("click", a.removeAllTags.bind(a)), a.on("add", function i(o) {
                console.log("onAddTag: ", o.detail), console.log("original input value: ", e.value), a.off("add", i)
            }).on("remove", function(e) {
                console.log(e.detail), console.log("tagify instance value:", a.value)
            }).on("input", function(e) {
                console.log(e.detail), console.log("onInput: ", e.detail)
            }).on("edit", function(e) {
                console.log("onTagEdit: ", e.detail)
            }).on("invalid", function(e) {
                console.log("onInvalidTag: ", e.detail)
            }).on("click", function(e) {
                console.log(e.detail), console.log("onTagClick: ", e.detail)
            }).on("dropdown:show", function(e) {
                console.log("onDropdownShow: ", e.detail)
            }).on("dropdown:hide", function(e) {
                console.log("onDropdownHide: ", e.detail)
            })
        }(), e = document.getElementById("kt_tagify_2"), new Tagify(e, {
                enforceWhitelist: !0,
                whitelist: [],
                callbacks: {
                    add: console.log,
                    remove: console.log
                }
            }),
            function() {
                var e = document.getElementById("kt_tagify_3"),
                    a = new Tagify(e);
                a.DOM.input.classList.add("form-control"), a.DOM.input.setAttribute("placeholder", "enter tag..."), a.DOM.scope.parentNode.insertBefore(a.DOM.input, a.DOM.scope)
            }(),
            function() {
                var e = document.getElementById("kt_tagify_10"),
                    a = new Tagify(e);
                a.DOM.input.classList.add("form-control"), a.DOM.input.setAttribute("placeholder", "enter tag..."), a.DOM.scope.parentNode.insertBefore(a.DOM.input, a.DOM.scope)
            }(),
            function() {
                var e = document.getElementById("kt_tagify_11"),
                    a = new Tagify(e);
                a.DOM.input.classList.add("form-control"), a.DOM.input.setAttribute("placeholder", "enter tag..."), a.DOM.scope.parentNode.insertBefore(a.DOM.input, a.DOM.scope)
            }(),
            function() {
                var e = document.getElementById("kt_tagify_12"),
                    a = new Tagify(e);
                a.DOM.input.classList.add("form-control"), a.DOM.input.setAttribute("placeholder", "enter tag..."), a.DOM.scope.parentNode.insertBefore(a.DOM.input, a.DOM.scope)
            }(),
            function() {
                var e = document.getElementById("kt_tagify_13"),
                    a = new Tagify(e);
                a.DOM.input.classList.add("form-control"), a.DOM.input.setAttribute("placeholder", "enter tag..."), a.DOM.scope.parentNode.insertBefore(a.DOM.input, a.DOM.scope)
            }(),
            function() {
                var e = document.getElementById("kt_tagify_4"),
                    a = new Tagify(e, {
                        pattern: /^.{0,20}$/,
                        delimiters: ", ",
                        maxTags: 6,
                        blacklist: [],
                        keepInvalidTags: !0,
                        whitelist: [],
                        transformTag: function(e) {
                            e.class = "tagify__tag tagify__tag--" + ["success", "brand", "danger", "success", "warning", "dark", "primary", "info"][KTUtil.getRandomInt(0, 7)], "shit" == e.value.toLowerCase() && (e.value = "s✲✲t")
                        },
                        dropdown: {
                            enabled: 3
                        }
                    });
                a.on("add", function(e) {
                    console.log(e.detail)
                }), a.on("invalid", function(e) {
                    console.log(e, e.detail)
                })
            }(), a = document.getElementById("kt_tagify_5"), new Tagify(a, {
                delimiters: ", ",
                maxTags: 10,
                blacklist: ["fuck", "shit", "pussy"],
                keepInvalidTags: !0,
                whitelist: [{
                    value: "Chris Muller",
                    email: "chris.muller@wix.com",
                    initials: "",
                    initialsState: "",
                    pic: "./assets/media/users/100_11.jpg",
                    class: "tagify__tag--brand"
                }, {
                    value: "Nick Bold",
                    email: "nick.seo@gmail.com",
                    initials: "SS",
                    initialsState: "warning",
                    pic: ""
                }, {
                    value: "Alon Silko",
                    email: "alon@gmail.com",
                    initials: "",
                    initialsState: "",
                    pic: "./assets/media/users/100_6.jpg"
                }, {
                    value: "Sam Seanic",
                    email: "sam.senic@loop.com",
                    initials: "",
                    initialsState: "",
                    pic: "./assets/media/users/100_8.jpg"
                }, {
                    value: "Sara Loran",
                    email: "sara.loran@tilda.com",
                    initials: "",
                    initialsState: "",
                    pic: "./assets/media/users/100_9.jpg"
                }, {
                    value: "Eric Davok",
                    email: "davok@mix.com",
                    initials: "",
                    initialsState: "",
                    pic: "./assets/media/users/100_13.jpg"
                }, {
                    value: "Sam Seanic",
                    email: "sam.senic@loop.com",
                    initials: "",
                    initialsState: "",
                    pic: "./assets/media/users/100_13.jpg"
                }, {
                    value: "Lina Nilson",
                    email: "lina.nilson@loop.com",
                    initials: "LN",
                    initialsState: "danger",
                    pic: "./assets/media/users/100_15.jpg"
                }],
                templates: {
                    dropdownItem: function(e) {
                        try {
                            return '<div class="tagify__dropdown__item"><div class="kt-media-card">    <span class="kt-media kt-media--' + (e.initialsState ? e.initialsState : "") + '" style="background-image: url(' + e.pic + ')">        <span>' + e.initials + '</span>    </span>    <div class="kt-media-card__info">        <a href="#" class="kt-media-card__title">' + e.value + '</a>        <span class="kt-media-card__desc">' + e.email + "</span>    </div></div></div>"
                        } catch (e) {}
                    }
                },
                transformTag: function(e) {
                    e.class = "tagify__tag tagify__tag--brand"
                },
                dropdown: {
                    classname: "color-blue",
                    enabled: 1,
                    maxItems: 5
                }
            })
    }
};
jQuery(document).ready(function() {
    KTTagify.init()
});