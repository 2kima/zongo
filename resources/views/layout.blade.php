<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <meta name="csrf-token" content="{{ csrf_token() }}" />
      <title>Poissonnerie</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css	">
      <link href="{{asset('css/app.css')}}" rel="stylesheet">

   </head>
   <body>
         @yield('content')
       
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" type="text/js"></script>
      <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>

      <script type="text/javascript">
      $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
var cart = Cookies.get('cart') ? JSON.parse(Cookies.get('cart')):  []

console.log(cart)
function cartAdded(poisson){
  //alert("valider")
  
 
 
    const index = cart.findIndex(item => {
        return item.id == poisson.id
    })

     console.log('index:'+index)
    if(index < 0){
        
    poisson.qte_stock = 1
    cart.push(poisson)
    setTotalItem();
    setTotalAmount();
   
    Cookies.set('cart', cart)

    }else{
    var poissonItem = cart[index]
    poissonItem.qte_stock = poissonItem.qte_stock + 1
    cart[index] = poissonItem

    //console.log("P:" +poissonItem)
    setTotalAmount()
    //setTotalItem()

    Cookies.set('cart', cart)
    
    }

}

//setTotalItem()

function setTotalItem(){
    var totalItem = 0;
    /*

    cart.forEach(item => {

      console.log(item)
        totalItem += parseInt(item.qte_stock) ;

    })
    */
    console.log(totalItem)


    $('.totalItem').html(cart.length)
}

$('.totalItem').click(function(){
    $('#cartModal .modal-title').html('Liste de vos commandes');
    setModalBody(cart)
    setTotalAmount()
})

function handleChangeQuantity(item){ 
    console.log("ee")
}

function setModalBody(cart){
    var body = '';
    cart.forEach((item, index) => {
    const handleChangeQuantityParam = {item}
    const removeToCartParams = '{index: 1 , item: 2}'

    body += '<div class="row item-'+index+'">'
    body += '<div class="col-3">'+item.title+'</div>'
    body += '<div class="col-3">'+item.prix.toLocaleString()+' CFA</div>'
    body += '<div class="col-3"><input type="number" min="0"  onkeydown="" value="'+item.qte_stock+'" class="form-control" id="itemQuantity-'+item.id+'"/></div>'
    body += '<div class="col-3"><button type="button" onclick="removeToCart('+JSON.stringify(removeToCartParams) +');" class="btn btn-danger btn-xs"><span class="fa fa-remove"></span></button></div>'
    body += '<div>'
    })   

    $('#cartModal .modal-body').html(body)
}

function setTotalAmount(){
    var total = 0

    cart.forEach(item => {
        total += item.prix * item.qte_stock
    })

    $('.totalAmount').html(total.toLocaleString()+" CFA")
}

function removeToCart(){
   console.log('d')
    //$(".item-"+index).remove()
   // cart.pop(index)
    // setTotalItem(cart)
}

function handleSubmit(){
  $.ajax({
      url: '/cartAdded',
      type: 'POST',
      data: cart,
      success: function(data){
          console.log(data)
      }
  })
}




function confirmer(){
    var res = confirm("Êtes-vous sûr de vouloir supprimer?");
    if(res){
        // Mettez ici la logique de suppression
    }
}


      </script>
   </body>
</html>
