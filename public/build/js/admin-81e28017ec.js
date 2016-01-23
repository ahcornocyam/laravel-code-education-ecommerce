//parte responsavel pelos pedidos na area administrativa

var order  = $("tr");
console.log('certinho');
order.click(function(){
  window.location.href = './orders/edit/'+$(this).attr('data-id');
});

//# sourceMappingURL=admin.js.map
