<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Invoice - <?= $booking['pnr_no'] ?></title>

    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 13px;
            color: #333;
            /* width: 21cm; */
            margin: 20px;
            background: #fff;
        }

        .clearfix::after {
            content: "";
            display: table;
            clear: both;
        }

        #logo img {
            width: 90px;
        }
        #logo h1 {
            font-size: 26px;
        }

        header {
            margin-bottom: 20px;
            border-bottom: 2px solid #666;
            padding-bottom: 10px;
        }

        h1 {
            text-align: center;
            margin: 10px 0;
            color: #444;
            font-size: 24px;
            letter-spacing: 1px;
        }

        /* Project & Company */
        #project,
        #company {
            width: 48%;
            float: left;
            line-height: 1.6;
        }

        #company {
            float: right;
            text-align: right;
        }

        #project span {
            display: inline-block;
            width: 90px;
            font-weight: bold;
        }

        /* TABLE */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
        }

        table th {
            background: #f0f0f0;
            padding: 10px;
            border-bottom: 1px solid #ccc;
            font-weight: bold;
            text-align: center;
        }

        table td {
            padding: 10px;
            border-bottom: 1px solid #eee;
            text-align: center;
        }

        table td.service,
        table td.desc {
            text-align: left;
        }

        /* TOTAL ROWS */
        .total-row td {
            font-weight: bold;
            background: #fafafa;
        }

        .grand-row td {
            font-weight: bold;
            font-size: 15px;
            background: #e8e8e8;
            border-top: 2px solid #666;
        }

        #notices {
            margin-top: 25px;
            font-size: 12px;
        }

        footer {
            position: fixed;
            bottom: 10px;
            text-align: center;
            width: 100%;
            border-top: 1px solid #ccc;
            padding-top: 5px;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>

<body>

    <?php
    $total = $booking['amount'];
    $checkin  = date('d M Y', strtotime($booking['check_in']));
    $checkout = date('d M Y', strtotime($booking['check_out']));
    $today = date('d M Y');
    ?>

    <header class="clearfix">

        <div id="logo" style="text-align:center;">
            <!-- <img src="<?= FCPATH . 'public/assets/img/icons/logo.png' ?>"> -->
            <h1>Firebnb</h1>
        </div>

        <h1>INVOICE – <?= $booking['pnr_no'] ?></h1>

        <div id="project">
            <p><span>Client:</span> <?= esc($booking['name']) ?></p>
            <p><span>Email:</span> <?= esc($booking['email']) ?></p>
            <p><span>Phone:</span> <?= esc($booking['phone']) ?></p>
            <p><span>Hotel:</span> <?= esc($hotel['property_name']) ?></p>
            <p><span>Room:</span> <?= esc($room['room_name']) ?></p>
            <p><span>Check-in:</span> <?= $checkin ?></p>
            <p><span>Check-out:</span> <?= $checkout ?></p>
        </div>

        <div id="company">
            <p><strong>Firebnb</strong></p>
            <p>India</p>
            <p>support@firebnb.com</p>
            <p>Invoice Date: <?= $today ?></p>
        </div>

    </header>

    <main>

        <table>
            <thead>
                <tr>
                    <th style="width:35%;">Service</th>
                    <th>Description</th>
                    <th style="width:15%;">Price</th>
                    <th style="width:10%;">Qty</th>
                    <th style="width:15%;">Total</th>
                </tr>
            </thead>

            <tbody>

                <tr>
                    <td class="service">
                        <?= esc($hotel['property_name']) ?> - <?= esc($room['room_name']) ?>
                    </td>
                    <td class="desc">
                        Booking from <b><?= $checkin ?></b> to <b><?= $checkout ?></b>
                    </td>
                    <td>₹<?= number_format($total, 2) ?></td>
                    <td>1</td>
                    <td>₹<?= number_format($total, 2) ?></td>
                </tr>

                <tr class="total-row">
                    <td colspan="4" style="text-align:right;">Subtotal</td>
                    <td>₹<?= number_format($total, 2) ?></td>
                </tr>

                <tr class="grand-row">
                    <td colspan="4" style="text-align:right;">Grand Total</td>
                    <td>₹<?= number_format($total, 2) ?></td>
                </tr>

            </tbody>
        </table>

        <div id="notices">
            <strong>Notice:</strong>
            This invoice was automatically generated after a successful booking.
        </div>

    </main>

    <footer>
        Firebnb © <?= date('Y') ?> – This invoice is valid without signature.
    </footer>

</body>

</html>