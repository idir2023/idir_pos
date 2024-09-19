<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            font-size: 12px;
            line-height: 18px;
            font-family: 'Ubuntu', sans-serif;
        }
        h2 {
            font-size: 16px;
        }
        td,
        th,
        tr,
        table {
            border-collapse: collapse;
        }
        tr {border-bottom: 1px dashed #ddd;}
        td,th {padding: 7px 0;width: 50%;}

        table {width: 100%;}
        tfoot tr th:first-child {text-align: left;}

        .centered {
            text-align: center;
            align-content: center;
        }
        small{font-size:11px;}

        @media print {
            * {
                font-size:12px;
                line-height: 20px;
            }
            td,th {padding: 5px 0;}
            .hidden-print {
                display: none !important;
            }
            tbody::after {
                content: '';
                display: block;
                page-break-after: always;
                page-break-inside: auto;
                page-break-before: avoid;
            }
        }
    </style>
</head>
<body>

<div style="max-width:400px;margin:0 auto">
    <div id="receipt-data">
        <div class="centered">
            <h2 style="margin-bottom: 5px"><?php echo e(settings()->company_name); ?></h2>

            <p style="font-size: 11px;line-height: 15px;margin-top: 0">
                <?php echo e(settings()->company_email); ?>, <?php echo e(settings()->company_phone); ?>

                <br><?php echo e(settings()->company_address); ?>

            </p>
        </div>
        <p>
            Date: <?php echo e(\Carbon\Carbon::parse($sale->date)->format('d M, Y')); ?><br>
            Reference: <?php echo e($sale->reference); ?><br>
            Name: <?php echo e($sale->customer_name); ?>

        </p>
        <table class="table-data">
            <tbody>
            <?php $__currentLoopData = $sale->saleDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $saleDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td colspan="2">
                        <?php echo e($saleDetail->product->product_name); ?>

                        (<?php echo e($saleDetail->quantity); ?> x <?php echo e(format_currency($saleDetail->price)); ?>)
                    </td>
                    <td style="text-align:right;vertical-align:bottom"><?php echo e(format_currency($saleDetail->sub_total)); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php if($sale->tax_percentage): ?>
                <tr>
                    <th colspan="2" style="text-align:left">Tax (<?php echo e($sale->tax_percentage); ?>%)</th>
                    <th style="text-align:right"><?php echo e(format_currency($sale->tax_amount)); ?></th>
                </tr>
            <?php endif; ?>
            <?php if($sale->discount_percentage): ?>
                <tr>
                    <th colspan="2" style="text-align:left">Discount (<?php echo e($sale->discount_percentage); ?>%)</th>
                    <th style="text-align:right"><?php echo e(format_currency($sale->discount_amount)); ?></th>
                </tr>
            <?php endif; ?>
            <?php if($sale->shipping_amount): ?>
                <tr>
                    <th colspan="2" style="text-align:left">Shipping</th>
                    <th style="text-align:right"><?php echo e(format_currency($sale->shipping_amount)); ?></th>
                </tr>
            <?php endif; ?>
            <tr>
                <th colspan="2" style="text-align:left">Grand Total</th>
                <th style="text-align:right"><?php echo e(format_currency($sale->total_amount)); ?></th>
            </tr>
            </tbody>
        </table>
        <table>
            <tbody>
                <tr style="background-color:#ddd;">
                    <td class="centered" style="padding: 5px;">
                        Paid By: <?php echo e($sale->payment_method); ?>

                    </td>
                    <td class="centered" style="padding: 5px;">
                        Amount: <?php echo e(format_currency($sale->paid_amount)); ?>

                    </td>
                </tr>
                <tr style="border-bottom: 0;">
                    <td class="centered" colspan="3">
                        <div style="margin-top: 10px;">
                            <?php echo \Milon\Barcode\Facades\DNS1DFacade::getBarcodeSVG($sale->reference, 'C128', 1, 25, 'black', false); ?>

                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
<?php /**PATH C:\Users\lenovo\Desktop\important files\triangle-pos\Modules/Sale\Resources/views/print-pos.blade.php ENDPATH**/ ?>