var items = $('#searchBox').data('items');
// console.log(items);

$("#searchBox").autocomplete({
    source: items,
    minLength: 2,
    position: {
        my : "right top",
        at: "right bottom"
    },
    select: function( event, ui ) { 
        event.preventDefault();
        window.location.href = ui.item.value;
    },
    response: function(event, ui) {
        if (!ui.content.length) {
            var noResult = { value:"",label:"No results found." };
            ui.content.push(noResult);
        }
    }
});