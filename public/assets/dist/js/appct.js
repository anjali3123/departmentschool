var appct = {
    clearErrors: function(e) {
        $(e).find('span.error-msg').html('');
        $(e).find('div.form-group.has-danger').removeClass('has-danger');
    },
    timedeff : function(s,t){
        let date1 = new Date(s);
        let date2 = new Date(t);
        let diff = date2.getTime() - date1.getTime();
        if (diff > 0) {
            let msec = diff;
            let hh = Math.floor(msec / 1000 / 60 / 60);
            hh = hh > 9 ? hh : '0' + hh;
            msec -= hh * 1000 * 60 * 60;
            let mm = Math.floor(msec / 1000 / 60);
            mm = mm > 9 ? mm : '0' + mm;
            msec -= mm * 1000 * 60;
            return (hh + ":" + mm);
        }else{
            return '';
        }
        // let ss = Math.floor(msec / 1000);
        // msec -= ss * 1000;

    },
    viewdateformat : function (d) {
        let date = new Date(d);
        let year = date.getFullYear();
        let month = (1 + date.getMonth()).toString();
        month = month.length > 1 ? month : '0' + month;
        let day = date.getDate().toString();
        day = day.length > 1 ? day : '0' + day;
        return month + '/' + day + '/' + year;
    }
};
$.loader = {
    on : function () {
        $('.preloader').fadeIn()
    },
    off: function(){
        $('.preloader').fadeOut()
    }
}
$.imagepopup = function(e){
    $.magnificPopup.open({
        items: {
        src: e.dataset.bsScr
        },
        type: 'image'
    });
}