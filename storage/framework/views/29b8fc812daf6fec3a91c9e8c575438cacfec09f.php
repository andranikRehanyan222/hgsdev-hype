<?php $__env->startSection('template_title'); ?>
    <?php echo __('Order '); ?>

    "<?php echo $data->id; ?>"
<?php $__env->stopSection(); ?>


<?php $__env->startSection('template_linked_css'); ?>
    <link rel="stylesheet" type="text/css" href="/plugins/dropify/dropify.min.css">
    <link href="/assets/css/users/account-setting.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>
    

<!-- HTML Content -->
<div class="row-fluid">
    <!-- Middle Section -->
        <form class="form-horizontal">
            <!-- Checkout Options -->
            <div class="form-group">
                <div class="col-sm-offset-5 col-sm-7">
                    <input type="hidden" id="order_id" name="order_id" value="<?php echo e($data->id); ?>">
                    <!-- Container for PayPal Shortcut Checkout -->
                    <div id="paypalCheckoutContainer"></div>

                </div>
            </div>
        </form>

</div>


<?php $__env->stopSection(); ?>


<?php $__env->startSection('template_scripts'); ?>

<!-- Javascript Import -->
<script src="https://www.paypal.com/sdk/js?client-id=ASyZxhZ6NjGMdcRQ1fZrZBBbvEiMtneEnEFUKvpsKVRJdKOTd5moanMRlVKJF-tFQbjj6q4vrTUzz4pI&commit=false"></script>
<script src="/paypal-test/js/config.js"></script>

<!-- PayPal In-Context Checkout script -->
<script type="text/javascript">
    paypal.Buttons({

        // Set your environment
        env: 'sandbox',

        // Set style of buttons
        style: {
            layout: 'horizontal',   // horizontal | vertical
            size:   'responsive',   // medium | large | responsive
            shape:  'pill',         // pill | rect
            color:  'gold',         // gold | blue | silver | black,
            fundingicons: false,    // true | false,
            tagline: false          // true | false,
        },

        // Wait for the PayPal button to be clicked
        createOrder: function() {
            let formData = new FormData();
            formData.append('order_id', document.getElementById("order_id").value);
            formData.append('return_url',  '<?php echo e(route('paypal.success')); ?>' + '?commit=false');
            formData.append('cancel_url', '<?php echo e(route('paypal.cancel')); ?>');

            return fetch(
                // '/paypal-test/api/createOrder.php',
                '/paypal/create',
                {
                    method: 'POST',
                    body: formData
                }
            ).then(function(response) {
                return response.json();
            }).then(function(resJson) {
                console.log('Order ID: '+ resJson.data.id);
                return resJson.data.id;
            });
        },

        // Wait for the payment to be authorized by the customer
        onApprove: function(data, actions) {
            // return fetch(
            //     'https://www.hgsdev.tk/paypal-test/api/getOrderDetails.php',
            //     {
            //         method: 'GET'
            //     }
            // ).then(function(res) {
            //     return res.json();
            // }).then(function(res) {
            //     window.location.href = '/autorounds/show/8';
            // });
            window.location.href = document.URL;
        },
        onError: ( error ) => {
            console.log('error',error);
        }

    }).render('#paypalCheckoutContainer');

</script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>