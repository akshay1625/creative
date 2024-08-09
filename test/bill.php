<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Label Table</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .main-table {
            width: 600px;
            border-collapse: collapse;
            margin: 20px auto;
            border: 1px solid black;
        }

        .main-table th,
        .main-table td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        .main-table th {
            background-color: #f2f2f2;
            text-align: center;
            font-weight: bold;
        }

        .header {
            font-size: 16px;
        }

        .subheader {
            font-size: 30px;
            text-align: center;
        }

        .content {
            font-size: 16px;
        }

        .highlight {
            background-color: black;
            color: white;
        }

        .logo,
        .barcode {
            display: block;
            margin: 0 auto;
            height: 50px;
        }

        .packed-by span {
            background-color: black;
            color: white;
            padding: 3px 6px;
            margin: 0 2px;
        }

        .inline-table {
            border-collapse: collapse;
            margin: 0;
        }

        .inline-table td {
            border: none;
            padding: 2px 8px;
            text-align: left;
        }

        .inline-table .subheader {
            font-size: 30px;
            text-align: center;
        }
    </style>
</head>

<body>
    <table class="main-table">
        <tr>
            <td colspan="2">
                <table class="inline-table">
                    <tr>
                        <td class="header">PRIVATE MARK</td>
                    </tr>
                    <tr>
                        <td class="subheader">4305</td>
                    </tr>
                    <tr>
                        <td class="highlight subheader">2</td>

                    </tr>
                </table>
            </td>
            <td colspan="2">
                <table class="inline-table">
                    <tr>
                        <td colspan="2" class="header">
                            JAI BALAJI LOGITECH<br>PVT LTD
                        </td>
                    </tr>
                    <tr>
                        <td class="content">GAYA<br>823001</td>
                    </tr>
                </table>
            </td>
        </tr>
        
    </table>
    <table class="main-table">
    <tr>
            <td colspan="1" class="content">
                <img src="link_locks_logo.png" alt="Link Locks Logo" class="logo">
            </td>
            <td colspan="2" >
                <table class="inline-table">
                    <tr>
                        <td colspan="2" class="header">INSIDE THIS BOX</td>
                    </tr>
                    <tr>
                        <td class="header">PRODUCTS</td>
                        <td class="header">QTY</td>
                    </tr>
                </table>
            </td>

        </tr>
    </table>
    <table class="main-table">
       
        <tr>
            <td colspan="3" class="content">770001822<br>LINK 111 RED</td>
            <td class="content">1</td>
        </tr>
        <tr>
            <td colspan="3" class="content">770001735<br>LINK PAD LOCK 40 ATOOT BCP -CK</td>
            <td class="content">140</td>
        </tr>
        <tr>
            <td colspan="3" class="content">770001869<br>LINK SLEEK GREEN</td>
            <td class="content">100</td>
        </tr>
        <tr>
            <td colspan="3" class="content">770001870<br>LINK SLEEK RBC</td>
            <td class="content">100</td>
        </tr>
        <tr>
        <td colspan="2" class="content packed-by">
                Checked & Packed by:---------------------------
                <span>24</span><span>G</span><span>04</span>
            </td>
        </tr>
        <tr>
            <td colspan="3" class="content">
                LINK LOCKS PVT. LTD.<br>
                A-7/10, CDF, UPSIDC, Ind Area, Aligarh-UP<br>
                Toll Free: 1800-547-4559<br>Email: sales@linklocks.com
            </td>
         
        </tr>
        <tr>
            <td colspan="4" class="content">
                <img src="barcode.png" alt="Barcode" class="barcode">
            </td>
        </tr>
    </table>
</body>

</html>