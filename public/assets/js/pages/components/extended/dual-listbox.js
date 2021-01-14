"use strict";
var KTDualListbox = {
    init: function() {
        $(".kt-dual-listbox").each(function() {
            var t = $(this),
                a = null != t.attr("data-available-title") ? t.attr("data-available-title") : "Available options",
                e = null != t.attr("data-selected-title") ? t.attr("data-selected-title") : "Selected options",
                l = null != t.attr("data-add") ? t.attr("data-add") : "Ekle",
                d = null != t.attr("data-remove") ? t.attr("data-remove") : "Sil",
                i = null != t.attr("data-add-all") ? t.attr("data-add-all") : "Tümünü Ekle",
                o = null != t.attr("data-remove-all") ? t.attr("data-remove-all") : "Tümünü Sil",
                n = [];
            t.children("option").each(function() {
                var t = $(this).val(),
                    a = $(this).text(),
                    e = !!$(this).is(":selected");
                n.push({
                    text: a,
                    value: t,
                    selected: e
                })
            });
            var r = null != t.attr("data-search") ? t.attr("data-search") : "";
            t.empty();
            var s = new DualListbox(t.get(0), {
                addEvent: function(t) {
                    console.log(t)
                },
                removeEvent: function(t) {
                    console.log(t)
                },
                availableTitle: a,
                selectedTitle: e,
                addButtonText: l,
                removeButtonText: d,
                addAllButtonText: i,
                removeAllButtonText: o,
                options: n
            });
            "false" == r && s.search.classList.add("dual-listbox__search--hidden")
        })
    }
};
KTUtil.ready(function() {
    KTDualListbox.init()
});