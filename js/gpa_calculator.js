function ConvertGradeToValue(e, t) {
    var n = ["A", "B+", "B", "C+", "C", "D+", "D", "E", "WF", "I", "NG", "S", "U"];
    var r = [4, 3.5, 3, 2.5, 2, 1.5, 1, 0, 0, 0, 0, 0, 0];
    var i = ["A", "A-", "B+", "B", "B-", "C+", "C", "C-", "D+", "D", "D-", "E", "WF", "I", "NG", "S", "U"];
    var s = [4, 3.67, 3.33, 3, 2.67, 2.33, 2, 1.67, 1.33, 1, .67, 0, 0, 0, 0, 0, 0];
    var o;
    var u = 0;
    t = t.toUpperCase();
    u = -1;
    if (e) {
        o = jQuery.inArray(t, n);
        if (o > -1) {
            u = r[o]
        }
    } else {
        o = jQuery.inArray(t, i);
        if (o > -1) {
            u = s[o]
        }
    }
    return u
}

function CreditHoursIsValid(e) {
    var t = false;
    var n = new RegExp(/^\d{1,3}(\.\d{0,2})?$/);
    if (e.match(n)) {
        t = e >= .5 && e <= 999
    }
    return t
}

function ComputeRow(e) {
    var t = jQuery("input[name='units']", jQuery(e.target).parents("tr:first")).val();
    if (CreditHoursIsValid(t)) {
        var n = jQuery("input[name='gradePre']", jQuery(e.target).parents("tr:first")).val();
        var r = jQuery("input[name='gradePost']", jQuery(e.target).parents("tr:first")).val();
        var i;
        if (n != "" && r == "") {
            i = ConvertGradeToValue(true, n)
        } else if (n == "" && r != "") {
            i = ConvertGradeToValue(false, r)
        } else if (n != "" && r != "") {
            alert("Please only enter one grade per row.");
            jQuery("input[name='gradepoints']", jQuery(e.target).parents("tr:first")).val("");
            return
        }
        if (i >= 0) {
            var s = t * i;
            jQuery("input[name='gradepoints']", jQuery(e.target).parents("tr:first")).val(s.toFixed(3))
        }
    } else if (t != "") {
        alert("Invalid number of credits entered.  '" + t + "' is not a number between 0.5 and 999.");
        jQuery("input[name='units']", jQuery(e.target).parents("tr:first")).focus()
    }
}

function ClearRow(e) {
    jQuery("input[name='units']", jQuery(e.target).parents("tr:first")).val("");
    jQuery("input[name='gradePre']", jQuery(e.target).parents("tr:first")).val("");
    jQuery("input[name='gradePost']", jQuery(e.target).parents("tr:first")).val("");
    jQuery("input[name='gradepoints']", jQuery(e.target).parents("tr:first")).val("");
    SumForm()
}

function SumForm() {
    var e = 0,
        t = 0,
        n;
    jQuery("input[name='units']").each(function() {
        if (jQuery(this).val() != "") {
            e += parseFloat(jQuery(this).val())
        }
    });
    jQuery("input[name='gradepoints']").each(function() {
        if (jQuery(this).val() != "") {
            t += parseFloat(jQuery(this).val())
        }
    });
    n = t / e;
    jQuery("#TotalCredits").val(e);
    jQuery("#TotalPointsEarned").val(t.toFixed(3));
    if (e > 0) {
        n = Math.floor(n * 1e3) / 1e3;
        jQuery("#TotalGPA").val(n.toFixed(3));
        var r = 0;
        if (n < 2) {
            r = parseFloat(e * 2) - t
        }
        jQuery("#DeficitPoints").val(r.toFixed(3))
    } else {
        jQuery("#TotalGPA").val(0);
        jQuery("#DeficitPoints").val(0)
    }
}

function ResetTotals() {
    jQuery("#TotalCredits").val("");
    jQuery("#TotalPointsEarned").val("");
    jQuery("#TotalGPA").val("");
    jQuery("#DeficitPoints").val("")
}