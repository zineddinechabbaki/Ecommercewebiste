<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <base href="/public">
    @include("admin.css")

</head>
<body>
  <H1>Order Details :</H1>
               Customer name :<H3>{{ $order->name }} </H3>
               Customer Email :<H3>{{ $order->Email }}</H3>
               Customer phone :<H3>{{ $order->phone }}</H3>
               Customer addresse :<H3>{{ $order->addresse }}</H3>
               Customer product title :<H3>{{ $order->product_title }}</H3>
               Order price:  <H3>{{ $order->price }}$</H3>
               quantity Product : <H3>{{ $order->quantity }}</H3>  
               payment status : <H3>{{ $order->payment_status }}</H3>
               delivery status :<H3>{{ $order->delivery_status }}</H3>
               image : <img src="images/{{ $order->image }}" alt="">
        
       
      
        </tbody>
      </table>
</body>
</html>