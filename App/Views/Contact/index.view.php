<head>
    <link rel="stylesheet" href="/public/css/contact/contact.css">
    <link rel="stylesheet" href="/public/css/auth/form.css">

    <script type="module" src="/public/js/send/SendMessageCreate.js"></script>

    <script
            type="text/javascript"
            src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"
                ></script>
    <script type="text/javascript">
    (function () {
        emailjs.init("D99Vjot0e4P3N5dJZ");
    })();
    </script>
</head>

<body>
<div class="container rounded-3 border mt-5 bg-light">
    <div class="row">
        <div class="col-md-6 p-5 backPanel whiteTextContact">
            <h1 class="greenText">Hi there!</h1>
            <h4>
                Here you can sent to us your review about our website
            </h4>
        </div>
        <div class="col-md-6 border-left py-3 whiteTextContact">
            <h1 class="greenText">Contact form</h1>
            <div class="form-group">
                <h5 for="name">Name</h5>
                <input
                    type="text"
                    class="form-control"
                    id="name"
                    placeholder="Enter name"
                    required autofocus
                />
            </div>
            <div class="form-group py-3 ">
                <h5 for="email">Email</h5>
                <input
                    type="email"
                    class="form-control"
                    id="email"
                    placeholder="Enter email"
                    required
                />
            </div>
            <div class="form-group">
                <h5 for="message">Message</h5>
                <textarea class="form-control" id="message" rows="3"></textarea>
            </div>
            <div class="buttonsSuccess mt-3">
                <button class="btn btn-success " id="submitButton">Submit</button>
                <h5 id="errorMessage" class="text-danger" style="display: none" for="message">Message</h5>
            </div>
        </div>
    </div>
</div>
</body>