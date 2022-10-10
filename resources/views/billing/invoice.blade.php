<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        {{config('app.name')}}
    </title>
    <link id="pagestyle" href="{{PUBLIC_DIR}}/css/invoice.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.1/css/all.min.css" integrity="sha512-ioRJH7yXnyX+7fXTQEKPULWkMn3CqMcapK0NNtCN8q//sW7ZeVFcbMJ9RvX99TwDg6P8rAH2IqUSt2TLab4Xmw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>



<div class="col-md-12">   
  
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-8 col-xs-offset-1 col-sm-offset-1 col-md-offset-2">
            <a href="/cart" type="button" class="btn btn-success" style="margin-top: 71px;"">{{__('Go Back')}} </a>
        </div>
           <div class="receipt-main col-xs-12 col-sm-12 col-md-8 col-xs-offset-1 col-sm-offset-1 col-md-offset-2">
               <div class="row">
                   <div class="receipt-header">
                       <div class="col-xs-6 col-sm-6 col-md-6">
                           <div class="receipt-left">
                               <img class="img-responsive" alt="iamgurdeeposahan" src="{{PUBLIC_DIR}}/img/logo.jpg"  style="width: 71px; border-radius: 43px;">
                           </div>
                       </div>
                       <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                           <div class="receipt-right">
                               <h5>BAKWATA ONLINE ACADEMY</h5>
                               <p>P.O BOX XXXX </p>
                               <p>payments@bakwataonlineacademy.ac.tz </p>
                               <p>Dar es salaam, Tanzania</p>
                           </div>
                       </div>
                   </div>
               </div>
               
               <div class="row">
                   <div class="receipt-header receipt-header-mid">
                       <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                           <div class="receipt-right">
                               <h5>{{$first_name}} {{$last_name}} </h5>
                               <p><b>Mobile :</b>{{$phone_number}}</p>
                               <p><b>Email :</b> {{$email}}</p>
                               <p><b>Address :</b> {{$region}}</p>
                               <p><b>Number :</b> {{$number}}</p>
                           </div>
                       </div>
                       <div class="col-xs-4 col-sm-4 col-md-4">
                           <div class="receipt-left">
                               <h3>INVOICE: BOA/INV/{{$order_id}}</h3>
                           </div>
                       </div>
                   </div>
               </div>
               
               <div>
                   <table class="table table-bordered">
                       <thead>
                           <tr>
                               <th>Description</th>
                               <th>Amount</th>
                           </tr>
                       </thead>
                       <tbody>
                        @if(!empty($cart['registration']))
                        <tr>                         
                         @foreach($cart['registration'] as $registration_in_cart)

                         <td class="col-md-9">
                        
                             {{-- <h6 class="mb-0"><a href="/course-details?id={{$course_in_cart->id}}">{{$course_in_cart->name}}</a></h6> --}}
                             <h6 class="mb-0">{{$registration_in_cart->name}}</h6>
                           
                         </td>
                             <!-- Info -->
                         <td class="col-md-3">
                             <div class="d-flex justify-content-between align-items-center mt-3">
                                 <!-- Price -->
                                 <span class="text-success">@if(!empty($registration_in_cart->price))
                                         {{formatCurrency($registration_in_cart->price,getWorkspaceCurrency($super_settings))}}

                                     @endif
                                 </span>

                             </div>
                         </td>
                         </div>


                         <hr> <!-- Divider -->


                     @endforeach

                 @endif
                   
                        @if(!empty($cart['course']))
                           <tr>                         
                            @foreach($cart['course'] as $course_in_cart)

                            <td class="col-md-9">
                           
                                {{-- <h6 class="mb-0"><a href="/course-details?id={{$course_in_cart->id}}">{{$course_in_cart->name}}</a></h6> --}}
                                <h6 class="mb-0">{{$course_in_cart->name}}</h6>
                              
                            </td>
                                <!-- Info -->
                            <td class="col-md-3">
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <!-- Price -->
                                    <span class="text-success">@if(!empty($course_in_cart->price))
                                            {{formatCurrency($course_in_cart->price,getWorkspaceCurrency($super_settings))}}

                                        @endif
                                    </span>

                                </div>
                            </td>
                            </div>


                            <hr> <!-- Divider -->


                        @endforeach

                    @endif
                      
                         
                           <tr>
                              
                               <td class="text-right"><h2><strong>Total: </strong></h2></td>
                               <td class="text-left text-danger"><h2><strong><i class="fa fa-inr"></i>   {{formatCurrency($order_total,getWorkspaceCurrency($super_settings))}}</strong></h2></td>
                           </tr>
                       </tbody>
                   </table>
               </div>           
               
           

    <h3><STRONG><span>JINSI YA KUFANYA MALIPO</span></STRONG></h3>

    <table class="inventory">
        <thead>
            <tr>
                <th><span>WEKA NAMBA YAKO YA SIMU HAPA CHINI,KISHA BONYEZA KITUFE CHA 'PAY', UJUMBE UTAINGIA KWENYE SIMU YAKO, RUHUSU MALIPO KWA KUWEKA PASSWORD</span></th>
                {{-- <th><span>CLICK BELOW BUTTON AFTER PAYMENT COMPLETION</span></th> --}}
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <div>
                        <form method="POST" action="/process-payment" accept-charset="UTF-8" name="ussd_push" enctype="multipart/form-data">
                            <input name="invoice"  value="{{$order_id}}" class="form-control" type="hidden">                                      
                            <input name="amount"  value="{{$order_total}}" class="form-control" type="hidden">
                            <input type="text" id="phone_number" name="phone_number" placeholder="Phone Number" class="text-input" required>
                            <div style="color:blue;" id="server_msg"></div>                          
                            @csrf
                            <button style="height:40px; width:100px;" type="submit" class="add btn-submit "><i class="far fa-caret-square-right"></i>&nbsp;<span class="pay_title">Pay</span></button>
                        </form> 
                    </div>
                    <br/>
                    <div class="blink_me" style="font-size:13px;color:red;"><i class="fas fa-chevron-right"></i>&nbsBefore clicking Pay, hold your phone, click pay and wait for further instruction on your phone screen. This method is currently available via <span style="font-size: larger;"><strong>Tigo&nbsp;,&nbsp;</strong><strong>Vodacom&nbsp;,&nbsp;</strong><strong>Airtel&nbsp;,&nbsp;</strong><strong>Zantel&nbsp;</strong></span></div>
                </td>
                {{-- <td>
                    <a href="<?= $status_url ?> " class="add recheck_status"><i class="far fa-caret-square-right"></i>&nbsp;Re-Check Status</a>
                    <div style="color:blue;" id="server_status_msg"></div>
                </td> --}}
            </tr>
        </tbody>
    </table>

    <h3><STRONG>AU LIPA KWA BUSINESS NUMBER KWA MTANDAO HUSIKA</STRONG></h3>
    <table class="address" id="c2b_channels">
        <thead>
            <tr>
                <th><span>Airtel</span></th>
                <th><span>Zantel</span></th>
                <th><span>Tigo</span></th>
                <th><span>Vodacom</span></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <input type="radio" id="airtel" name="channel" data-channel="airtelmoney">
                    <label for="airtel"><img src="{{PUBLIC_DIR}}/img/airtel-money.jpg" height="72" width="96" alt="airtel_img"></label>
                  
                    <ol style="list-style-type: disc;">
                        <li><strong>Dial *150*60#</strong></li>
                        <li>Choose 5 - Make Payment</li>
                        <li>Choose 4 - Enter business number</li>
                        <li>Enter <b>333443</b></li>
                        <li>Enter amount <strong> {{formatCurrency($order_total,getWorkspaceCurrency($super_settings))}}</strong></li>
                        <li>Enter reference number (Pay Number) : <strong class="pay_reference"></strong></li>
                        <li>Enter PIN</li>
                        <li>Confirm Payment</li>
                        <li>You will receive confirmation SMS</li>
                        <li>Payment will reflect in the account within 2 mins</li>
                    </ol>
                </td>
                <td>
                    <input type="radio" id="zantel" name="channel" data-channel="ezypesa">
                    <label for="zantel"><img src="{{PUBLIC_DIR}}/img/ezypesa.png" height="72" width="96" alt="zantel_img"></label>
                    <ol style="list-style-type: disc;">
                        <li><strong>Dial *150*02#</strong></li>
                        <li>Choose 5 - Payments</li>
                        <li>Choose 8 - Enter business number</li>
                        <li>Enter <b>132244</b></li>
                        <li>Enter reference number (Pay Number) : <strong class="pay_reference"></strong></li>
                        <li>Enter amount <strong> {{formatCurrency($order_total,getWorkspaceCurrency($super_settings))}} </strong></li>
                        <li>Enter PIN</li>
                        <li>Confirm Payment</li>
                        <li>You will receive confirmation SMS</li>
                        <li>Payment will reflect in the account within 2 mins</li>
                    </ol>
                </td>
                <td>
                    <input type="radio" id="tigo" name="channel" data-channel="tigopesa">
                    <label for="tigo"><img src="{{PUBLIC_DIR}}/img/tigopesa.png" height="72" width="96" alt="tigo_img"></label>
                    <ol style="list-style-type: disc;">
                        <li><strong>Dial *150*01#</strong></li>
                        <li>Choose 4 - Pay bill</li>
                        <li>Choose 3 - Enter business number</li>
                        <li>Enter <b>333444</b></li>
                        <li>Enter reference number (Pay Number) : <strong class="pay_reference"></strong></li>
                        <li>Enter amount <strong>{{formatCurrency($order_total,getWorkspaceCurrency($super_settings))}} </strong></li>
                        <li>Enter PIN</li>
                        <li>Confirm Payment</li>
                        <li>You will receive confirmation SMS</li>
                        <li>Payment will reflect in the account within 2 mins</li>
                    </ol>
                </td>
                <td>
                    <input type="radio" id="vodacom" name="channel" data-channel="mpesa">
                    <label for="vodacom"><img src="{{PUBLIC_DIR}}/img/M-pesa-logo.png" height="48" width="72" alt="vodacom_img"></label>
                    <ol style="list-style-type: disc;">
                        <li><strong>Dial *150*00#</strong></li>
                        <li>Choose 4 - Pay by M-Pesa</li>
                        <li>Choose 4 - Enter business number</li>
                        <li>Enter <b>839938</b></li>
                        <li>Enter reference number (Pay Number) : <strong class="pay_reference"></strong></li>
                        <li>Enter amount <strong> {{formatCurrency($order_total,getWorkspaceCurrency($super_settings))}} </strong></li>
                        <li>Enter PIN</li>
                        <li>Confirm Payment</li>
                        <li>You will receive confirmation SMS</li>
                        <li>Payment will reflect in the account within 2 mins</li>
                    </ol>
                    </td>
                </tr>
            </tbody>
         </table>
        </div>
    </div>
</div>   
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha512-+NqPlbbtM1QqiK8ZAo4Yrj2c4lNQoGv8P79DPtKzj++l5jnN39rHA/xsqn8zE9l0uSoxaCdrOgFs6yjyfbBxSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.1/jquery.form.min.js" integrity="sha512-7PPqr8/6AIfaOwdMdOGoKGz81rzjasImI0s8Vlwv6Dtw9TH2/TDkoBLzk1C3q+sI6oNd0JtJKtLqui/NcNphOw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
			$(function() {
      		
                let $body = $('body');
				$body.on("click", "a.recheck_status", function ($e) {
					$e.preventDefault();
					let $href = $(this).attr('href');
					$.ajax({
						method: "POST",
						url: $href,
						data: { reference: $(".pay_reference").html() },
						beforeSend: function ($e) {
							$body.find('.recheck_status i').removeClass("far fa-caret-square-right").addClass('fa fa-spinner');
						},
						success : function ($data) {
							/* console.log($data); */
							if ($data.success) {
								$("#server_status_msg").html($data.status);
								if ($data.status === "COMPLETED") {
					
								}
							} else {
								$("#server_status_msg").html($data.error);
							}
						}
					})
					.done(function( $data ) {
						$body.find('.recheck_status i').removeClass("fas fa-spinner").addClass('far fa-caret-square-right');
					});
				});
				$body.on('submit', 'form[name=ussd_push]', function ($e) {
					$e.preventDefault();
					let $form = $(this);
					let $options = {
						dataType : "json",
						type : "POST",
						url : $form.attr("action"),
						beforeSend : function ($e) {
							$("#server_msg").html("");
							$form.find(".btn-submit").prop('disabled', true);
							$form.find('.btn-submit i').removeClass("far fa-caret-square-right").addClass('fa fa-spinner');
							$form.find('.pay_title').html("Waiting Payment");
						},
						success : function ($data) {
							/* console.log($data); */
							if ($data.success) {
								$(".pay_reference").html($data.reference);
								$("#server_msg").html($data.status);
							} else {
								$("#server_msg").html($data.error);
							}
							if (!$data.reference) {
								$form.find(".btn-submit").prop('disabled', false);
								$form.find('.btn-submit i').removeClass("fas fa-spinner").addClass('far fa-caret-square-right');
								$form.find('.pay_title').html("Pay");
								$form.append('<div class="alert alert-danger general_error" role="alert">' + $data.message + '</div>'); $form.find('.general_error').fadeOut(11000);
							}
						},
						error: function ($data) {
							console.log($data);
							$form.find(".btn-submit").prop('disabled', false);
							$form.find('.btn-submit i').removeClass("fas fa-spinner").addClass('far fa-caret-square-right');
							$form.find('.pay_title').html("Pay");
							// let errors = $.parseJSON($data.responseText);
							/*console.log(errors);*/
							/* $.each(errors.errors, function($index, $value) {
								if ($index === 'general_error') { $($form).prepend('<div class="alert alert-danger general_error" role="alert">' + $value + '</div>'); $('.general_error').fadeOut(11000); }
							}); */
						}
					};
					$($form).ajaxSubmit($options);
				});
			});
</script>
   
</html>