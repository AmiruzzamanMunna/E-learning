<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        {{-- <link href="https://fonts.googleapis.com/css2?family=Berkshire+Swash&display=swap" rel="stylesheet"> --}}
        <title>Document</title>
        <style>
            
            body {
               font-family: 'Roboto', sans-serif;
            }
    
            .bgcolor {
                background: #333;
                -webkit-print-color-adjust: exact;
            }
            .bgimage{
                background-image: url({{asset('public/assets/images/certificate/Certificate.jpg')}});
                -webkit-print-color-adjust: exact;
            }
            p{
                font-weight: 500;
                color: #333;
            }
            li{
              font-weight: 500;  
              color: #333;
            }
    
        </style>
        
    </head>
<body>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" role="presentation">
        <tr>
            <td align="center" bgcolor="#fff" style="padding: 12px 24px 12px 24px;" class="no-padding">
                <!-- HERO -->
                <table width="612" hight="792" align="center" border="0" cellpadding="0" cellspacing="0" style="width: 612px; height: 792px;padding: 8px;padding-top: 0px;background-repeat: no-repeat;background-position: center center;background-size: cover" class="fluid bgimage" role="presentation">
                 
                    <tr>
                        <td style="text-align: center;padding-top: 130px;">
                            <h1 style="margin-bottom: -5px;font-family: 'Berkshire Swash', cursive;font-size: 40px;color: #ec5a1f">{{$user->signup_name}}</h1>
                            <h4 style="text-transform: uppercase;padding-top: 15px;padding-bottom: 3px;">Your Headline Here :</h4>
                            <p style="font-weight: 400;line-height: 24px;">This is to Certify that {{$user->signup_name}} successfully the online course {{$courseDetails->course_name}} on {{date('d F, Y',strtotime(date('Y-m-d')))}}</p>
                        </td>
                    </tr>
                    
                </table>

            </td>
        </tr>
    </table>
</body>
</html>