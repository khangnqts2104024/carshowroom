@extends('layouts.layout')
@section('content')
    <link rel="stylesheet" href="/css/order.css">

    <div class="container">
        <div class="title">
            <h2>Product Order Form</h2>
        </div>
        <div class="d-flex d-flexCustom">
            <form action="" method="">
                <div class="d-flex" style="flex-direction: column">
                  <label class="labelCustom">
                    <span class="fname">Full Name <span class="required">*</span></span>
                    <input class="input" type="text" name="fname">
                </label>
  
                <label class="labelCustom">
                    <span>Country <span class="required">*</span></span>
                      <select  name="selection">
                        <option value="select" disabled>Viet Nam</option>
                      </select>   
                </label>

                <label class="labelCustom">
                  <span>Model</span>
                    <select  name="selection">
                      <option value="select" >Select your model</option>
                      <option value="select">Vfe34</option>
                      <option value="select">President</option>
                      <option value="select">LuxA2.0</option>
                      <option value="select">LuxSA2.0</option>
                      <option value="select">Fadil</option>

                    </select>   
              </label>

                <label class="labelCustom">
                    <span>Address <span class="required">*</span></span>
                    <input class="input" type="text" name="houseadd" placeholder="House number and street name" required>
                </label>
                
                <label class="labelCustom">
                    <span>Region <span class="required">*</span></span>
                    <input class="input" type="text" name="city">
                </label>
                
                
                
                <label class="labelCustom">
                    <span>Phone Number<span class="required">*</span></span>
                    <input class="input" type="tel" name="city">
                </label>
                <label class="labelCustom">
                    <span>Email Address <span class="required">*</span></span>
                    <input class="input" type="email" name="city">
                </label>

                <div class="imgCarHolder">
                  <img src="/HomepageImage/slide2/Fadil.png" alt="">
                </div>
                </div>
            </form>
            <div class="Yorder">
                <table class="tableCustom">
                    <tr>
                        <th colspan="2">Your order</th>
                    </tr>
                    <tr>
                        <td>VFe34 Car</td>
                        <td>690.000.000VND</td>
                    </tr>

                    <tr>
                      <td style="color: red">Deposit</td>
                      <td style="color: red">$88.00</td>
                  </tr>

                    <tr>
                        <td>Subtotal</td>
                        <td style="color: red">$88.00</td>
                    </tr>
                    <tr>
                        <td>Shipping</td>
                        <td>Free shipping</td>
                    </tr>
                </table>
                <div>
                    <input type="radio" name="dbt" value="dbt" checked> Cash Directly
                </div>
                <p class="textPayment">
                    Make your payment directly into our bank account. Please use your Order ID as the payment reference.
                    Your order will not be shipped until the funds have cleared in our account.
                </p>
              
                
                <button class="buttonCustom" type="button">Place Order</button>
            </div><!-- Yorder -->
        </div>
    </div>
@endsection
