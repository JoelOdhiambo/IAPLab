$(document).ready(function(){
    //return number of minutes ahead or behind the GMT
    var offset=new Date().getTimezoneOffset();

    //return number of milliseconds since 1970/01/01:*/
    var utc_timestamp=timestamp+(6000*offset);

    $('#time_zone_offset').val(offset);
    $('#utc_timestamp').val(utc_timestamp);
})