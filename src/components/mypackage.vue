<template>
    <main>
        <div class="mypackage-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <aside>
                            <ul class="aside-menu">
                                <li>
                                    <a href="" class="packages">
                                        <span class="icon">
                                            <span class="noicon"></span>
                                        </span>
                                        <span class="list-text">Packages</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="" class="my-account">
                                        <span class="icon icon-man-user"></span>
                                        <span class="list-text">My Account</span>
                                    </a>
                                </li>
                            </ul>
                        </aside>
                    </div>
                    <div class="col-sm-10">
                        <div class="price-list-block">
                            <div class="title-text">Pick your price</div>
                            <div class="price-block">
                                <div class="price-item">
                                    <div class="price-title">Basic</div>
                                    <div class="count-text">10 videos</div>
                                    <ul class="includ-list">
                                        <li>advantage 1</li>
                                        <li>another</li>
                                    </ul>
                                    <div class="price upper">Free</div>
                                    <a href="" class="butn butn-white-trans active">Your plan</a>
                                </div>
                                <div class="price-item">
                                    <div class="price-title">Silver</div>
                                    <div class="count-text">30 videos</div>
                                    <ul class="includ-list">
                                        <li>advantage 1</li>
                                        <li>another</li>
                                        <li>advantage 1</li>
                                    </ul>
                                    <div class="price"><span>$</span> 3</div>
                                    <a href="" class="butn butn-white-trans">Restart plan</a>
                                </div>
                                <div class="price-item">
                                    <div class="price-title">Gold</div>
                                    <div class="count-text">100 videos</div>
                                    <ul class="includ-list">
                                        <li>advantage 1</li>
                                        <li>another</li>
                                        <li>advantage 1</li>
                                        <li>another</li>
                                        <li>advantage 1</li>
                                    </ul>
                                    <div class="price"><span>$</span> 5</div>
                                    <a href="" class="butn butn-white-trans">Select this</a>
                                </div>
                                <div class="price-item">
                                    <div class="price-title">Platinum</div>
                                    <div class="count-text">150 videos</div>
                                    <ul class="includ-list">
                                        <li>advantage 1</li>
                                        <li>another</li>
                                        <li>advantage 1</li>
                                        <li>another</li>
                                        <li>advantage 1</li>
                                    </ul>
                                    <div class="price"><span>$</span> 7</div>
                                    <a href="" class="butn butn-white-trans">Select this</a>
                                    <div class="best-text">
                                        <div>Best Choise</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10">
                                <div class="payment-block-wrap">
                                    <div class="title-text">Payment information</div>
                                    <div class="payment-block">
                                        <div class="payment-info"><span class="icon icon-paypal-big-logo"></span>example@redentu.com</div>
                                        <a id="payinfo" href="" class="butn btn-cta1b btn-lg">Update payment information <span class="icon icon-scroll-arrow-to-down"></span></a>
                                    </div>
                                    <div class="payment-content-block">
                                        <div class="payment-content">
                                            <div class="title-text">Update Payment Information</div>
                                            <p class="payment-text">Your new payment method will be applied to your next billing cycle. Your monthly membership is billed on the first day of each billing period.</p>
                                            <div class="card-text">
                                                <span class="bold">Credit or Debit Card</span>
                                                <img src="~@/assets/img/visa.png" alt="">
                                                <img src="~@/assets/img/mastercard.png" alt="">
                                            </div>
                                            <div class="payment-form-block">
                                                <form action="" method="">
                                                    <div class="payment-form-left">
                                                        <div class="input-wrap">
                                                            <label>First Name <span class="label-add-text">Must match card</span></label>
                                                            <input type="text" name="firstname">
                                                        </div>
                                                        <div class="input-wrap input-lock">
                                                            <label>Card Number</label>
                                                            <input type="text" name="cardnumber">
                                                        </div>
                                                        <div class="input-wrap input-lock">
                                                            <label>CVC</label>
                                                            <input type="text" name="cvc">
                                                        </div>
                                                    </div>
                                                    <div class="payment-form-right">
                                                        <div class="input-wrap">
                                                            <label>Last Name <span class="label-add-text">Must match card</span></label>
                                                            <input type="text" name="lastname">
                                                        </div>
                                                        <div class="date-block">
                                                            <div class="sublabel">Expiration Date</div>
                                                            <div class="input-wrap">
                                                                <input type="text" name="year">
                                                            </div>
                                                            <span>/</span>
                                                            <div class="input-wrap">
                                                                <input type="text" name="month">
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="butn btn-cta1b btn-lg">Update payment method</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="paypal-block">
                                            <div class="card-text">
                                                <span class="bold">Pay Pal</span>
                                                <img src="~@/assets/img/paypal.png" alt="">
                                            </div>
                                            <p class="payment-text">To finish sign-up, click on the "Continue to PayPal" button and log on to PayPal using your email and password.</p>
                                            <a href="" class="butn btn-cta1b btn-lg">Continue to Pay Pal</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>
<script>

  export default {

    mounted: function () {

      $("#payinfo").click(function () {
        $('.payment-content-block').slideToggle(500);
        $(this).toggleClass("open");
        return false;
      })


    },
  }

</script>