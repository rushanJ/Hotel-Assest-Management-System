<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Stripe Checkout Sample</title>

    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="css/global.css" />
    <script src="https://js.stripe.com/v3/"></script>
    <!-- <script src="./index.js" defer></script> -->
  </head>

  <body>
    <!-- <div class="sr-root">
      <div class="sr-main">
        <section class="container">
          <div>
            <h1>Single photo</h1>
            <h4>Purchase a Pasha original photo</h4>

            <div class="pasha-image">
              <img
                src="https://picsum.photos/280/320?random=4"
                width="140"
                height="160"
              />
            </div>
          </div>

          <form action="/create-checkout-session" method="POST">
            <div class="quantity-setter">
              <button class="increment-btn" id="subtract" disabled type="button">-</button>
              <input type="number" id="quantity-input" min="1" value="1" name="quantity" />
              <button class="increment-btn" id="add" type="button">+</button>
            </div>

            <p class="sr-legal-text">Number of copies (max 10)</p>

            <button type="submit" id="submit">Buy</button>
          </form>
        </section>

        <div id="error-message"></div>
      </div>
    </div> -->
        <!-- <script>

            var stripe= Stripe("pk_test_51Hr9i7K5z0mbMwohssUy8NDCG9D2ajtcsmuQeYIpumTMZVlSaGf8ZcNo5i8J4PFBLkVOA5vwUXBq7rFZmuLdqaSu00kiDgZVlv")
            stripe.redirectToCheckout({ 
                lineItems:[
                    {
                        price:"320",
                        quantity:1,

                    }
                ],
                mode:"payment",
                successUrl:"https://www.google.com/",
                cancelUrl:"https://www.google.com/",

            })
            .then(function(result)){
                console.log(result);
            };


</script> -->

<form action='https://www.2checkout.com/checkout/purchase' method='post'>
<input type='hidden' name='sid' value='252752042845' />
<input type='hidden' name='mode' value='2CO' />
<input type='hidden' name='li_0_name' value='test' />
<input type='hidden' name='li_0_price' value='1.00' />
<input type='hidden' name='demo' value='Y' />
<input name='submit' type='submit' value='Checkout' />
</form>

  </body>
</html>