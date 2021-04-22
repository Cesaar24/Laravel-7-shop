<!DOCTYPE html>
<html >

<div>
    <h1 style="text-align: center; margin: 30px 30px;"> Hemos Recibido su Pedido</h1>
    <p style="margin-left: 30px;">Gracias {{$msg['name']}} Hemos recibido su pedido.</p>
    <p style="margin-left: 30px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea.
    </p>
    <div>
        <h2>Detalles Pago:</h2>
        <ul>
            <li>    <span style="color: #ff0000;font-size: 22px;font-family: Karla, sans-serif;">loremi:</span>
                <ul>
                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiu</li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiu</li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiu</li>
                </ul>
            </li>
            <li>    <span style="color: #ff0000;font-size: 22px;font-family: Karla, sans-serif;">loremi:</span>
                <ul>
                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiu</li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiu</li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiu</li>
                </ul>
            </li>
            <li>    <span style="color: #ff0000;font-size: 22px;font-family: Karla, sans-serif;">loremi:</span>
                <ul>
                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiu</li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiu</li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiu</li>
                </ul>
            </li>
        </ul>
    </div>
    <div>
        <h2>Detalles de Compra:<strong style="font-family: Karla,sans-serif; font-size: 25px; color: #ff0000;">Pedido:{{$msg['id_order']}}</strong><strong style=" margin-left: 10px;">({{$msg['date']->format('d/m/Y')}})</strong></h2>
        <table >
            <thead>
                <tr>
                    <th style="padding-left: 50px; padding-bottom: 15px;" >#</th>
                    <th style="padding-left: 50px; padding-bottom: 15px;">Producto</th>
                    <th style="padding-left: 50px; padding-bottom: 15px;">Cantidad</th>
                    <th style="padding-left: 50px; padding-bottom: 15px;">Precio</th>
                </tr>
            </thead>
            <tbody>
                @php($total = 0)
                @foreach($msg['products'] as $item)
                <tr>
                    <th style="padding-left: 50px; padding-bottom: 15px;">{{$loop->iteration}}</th>
                    <td style="padding-left: 50px; padding-bottom: 15px;">{{$item->name}}</td>
                    <td style="padding-left: 50px; padding-bottom: 15px;">{{$item->quantity}}</td>
                    <td style="padding-left: 50px; padding-bottom: 15px;">${{$item->price}}</td>
                    @php($total += $item->quantity*$item->price)    
                </tr>

                @endforeach
                {{-- end for --}}

                <tr>
                    <th style="padding-left: 50px; padding-bottom: 15px;">Subtotal</th>
                    <td style="padding-left: 50px; padding-bottom: 15px;"></td>
                    <td style="padding-left: 50px; padding-bottom: 15px;"></td>
                    <td style="padding-left: 50px; padding-bottom: 15px;">${{$total}}</td>
                </tr>
                <tr>
                    <th style="padding-left: 50px; padding-bottom: 15px;">Envio</th>
                    <td style="padding-left: 50px; padding-bottom: 15px;"></td>
                    <td style="padding-left: 50px; padding-bottom: 15px;"></td>
                    <td style="padding-left: 50px; padding-bottom: 15px;">{{$msg['delivery']}}</td>
                </tr>
                <tr>
                    <th style="padding-left: 50px; padding-bottom: 15px;">Pago</th>
                    <td style="padding-left: 50px; padding-bottom: 15px;"></td>
                    <td style="padding-left: 50px; padding-bottom: 15px;"></td>
                    <td style="padding-left: 50px; padding-bottom: 15px;">{{$msg['payment']}}</td>
                </tr>
                <tr>
                    <th style="padding-left: 50px; padding-bottom: 15px;">Total</th>
                    <td style="padding-left: 50px; padding-bottom: 15px;"></td>
                    <td style="padding-left: 50px; padding-bottom: 15px;"></td>
                    @if($msg['delivery'] != 'Retiro en Tienda')
                    <td style="padding-left: 50px; padding-bottom: 15px;">${{$total+1}}</td>
                    @else
                    <td style="padding-left: 50px; padding-bottom: 15px;">${{$total}}</td>
                    @endif
                </tr>
            </tbody>
        </table>
        
        
    </div>
{{-- {{$msg}} --}}
</div>
   


</html>
