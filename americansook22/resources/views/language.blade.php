<!DOCTYPE html>
<html>
<head>
    <title>Web Form With Language Translation</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
    <style type="text/css">
        body {
            background-color: #2ecc71;
            font-family: source-sans-pro, sans-serif;
        }

        h1 {
            margin-left: auto;
            margin-top: 50px;
            text-align: center;
            font-weight: 100;
            font-size: 2.8em;
            color: #ffffff;
        }

        div {
            width: 500px;
            margin: auto;
        }

        .formStyle {
            background-color: #2ecc71;
            padding: 20px;
            width: 400px;
            margin-bottom: 20px;
            border-bottom-width: 1px;
            border-bottom-style: solid;
            border-bottom-color: #ecf0f1;
            border-top-style: none;
            border-right-style: none;
            border-left-style: none;
            font-size: 1em;
            font-weight: 100;
            color: #ffffff;
        }

        .formButton {
            float: right;
            background-color: #ffffff;
            display: inline-block;
            color: #2ecc71;
            font-size: 28px;
            font-weight: 500;
            padding: 6px 24px;
            margin-top: 15px;
            margin-right: 60px;
            text-decoration: none;
        }

        .formButton:hover {
            background-color: #27ae60;
            color: #ffffff;
        }

        .formButton:active {
            position: relative;
            top: 3px;
        }

        .translate {
            margin-left: auto;
            margin-top: 50px;
            text-align: center;
            font-weight: 100;
            font-size: 2.8em;
            width: 50%;

        }

        .translate-option {
            width: 50%;

        }

        /*To remove the outline that appears on clicking the input textbox*/
        input:focus {
            outline: none;
        }

        /* To format the placeholder text color */
        ::-webkit-input-placeholder {
            color: #ecf0f1;
        }

        :-moz-placeholder { /* Firefox 18- */
            color: #ecf0f1;
        }

        ::-moz-placeholder { /* Firefox 19+ */
            color: #ecf0f1;
        }

        :-ms-input-placeholder {
            color: #ecf0f1;
        }
    </style>

    <script type="text/javascript">

        var settings = {
            "async": true,
            "crossDomain": true,
            "url": "https://google-translate1.p.rapidapi.com/language/translate/v2",
            "method": "POST",
            "headers": {
                "x-rapidapi-host": "google-translate1.p.rapidapi.com",
                "x-rapidapi-key": "3e249262cdmsh21615d04fd78410p133333jsnbf63da535288",

                // "x-rapidapi-key": "1676d04472msh98c169138e3ed71p11bc46jsndece0aaf2dc2",
                "content-type": "application/x-www-form-urlencoded"

                //    taimoor account
                //     "x-rapidapi-host": "google-translate1.p.rapidapi.com",
                //     "accept-encoding": "application/gzip",
                //     "x-rapidapi-key": "3e249262cdmsh21615d04fd78410p133333jsnbf63da535288",

            },
            "data": {
                "source": "en",
                "q": "Contact Form | Name | Contact Number | Email",
                "target": ""
            }

        }

        $(document).ready(function () {

            $(".dropdown-item").click(function (e) {

                if ($(this).attr("tolang") != 'en') {

                    settings.data.target = $(this).attr("tolang");
                    console.log('before fetchTranslation function');
                    fetchTranslation();
                    console.log('after fetchTranslation function');

                    $('button').html($(this).html());
                } else {
                    updatePlaceholders(settings.data.q);
                    $('#langSel').html("Translate to");
                }
            });
        });

        function fetchTranslation() {
            $.ajax(settings).done(function (response) {
                console.log(response);
                console.log('fetchTranslation function is here');
                var translatedText = response.data.translations[0].translatedText;
                updatePlaceholders(translatedText);
            });
        }
        function updatePlaceholders(updateString) {
            console.log('this is a updatePlaceholders function');
            var comp = updateString.split('|')
            console.log('now putting data');
            $('form > input').each(function (idx) {
                $(this).prop("placeholder", comp[idx + 1].trim());
            });
            console.log('data set completed');
            $("#formHeading").html(comp[0]);
        }
    </script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm">

        </div>
        <div class="col-sm">
            <div class="btn-group dropright translate">
                <button id="langSel" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                    Translate to
                </button>
                <div class="dropdown-menu translate-option">
                    <a class="dropdown-item" href="#" tolang="en">English (default)</a>
                    <a class="dropdown-item" href="#" tolang="it">Italian</a>
                    <a class="dropdown-item" href="#" tolang="es">Spanish</a>
                    <a class="dropdown-item" href="#" tolang="de">German</a>
                </div>
            </div>
            <h1 id="formHeading">
                Contact Form
            </h1>
            <div>
                <form action="">
                    <input type="text" name="name" class="formStyle" placeholder="Name" required/>
                    <input type="text" name="contact" class="formStyle" placeholder="Contact No." required/>
                    <input type="email" name="email" class="formStyle" placeholder="Email address" required/>
                    <input type="email" name="address" class="formStyle" placeholder="this is my address" required/>

                </form>
            </div>
        </div>
        <div class="col-sm">

        </div>
    </div>
</div>

</body>
</html>
