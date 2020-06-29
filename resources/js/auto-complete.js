$(document).ready(function(){
    $('#author').autocomplete({
        serviceUrl: 'http://localhost:8000/api/authors',
        onSelect: function (data) {
            console.log(data);
        }
    });
});