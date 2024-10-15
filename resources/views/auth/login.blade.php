@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traco - Login</title>
    <!-- Inter Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

    <!-- Anybody Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anybody:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <div class="container">
        <div class="left-side">
            <img src="{{ asset('icons/tracologo.png') }}" alt="Logo"
                style="width: 535px; height: 162px; margin: 0 0 0 20%;">

            <div class="desc"
                style="display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center; font-family: Poppins;">
                <h5 style="padding-top:2rem; margin-bottom: 0; font-weight: 600; font-size: 16px;">Vision</h5>
                <p style="width: auto; font-weight: 400; font-size: 13px;">An agrarian reform cooperative with <br>
                    prosperous entrepreneur members.</p>

                <h5 style="margin-bottom: 0; font-weight: 600; font-size: 16px;">Mission</h5>
                <p style="width: auto; font-weight: 400; font-size: 13px;">
                    The Cooperative shall:
                    <br>Produce and supply world class products and services;
                    <br>Develop prosperous entrepreneurs and
                    <br>Achieve economic abundance.
                </p>

                <h5 style="margin-bottom: 0; font-weight: 600; font-size: 16px;">Goal</h5>
                <p style="width: auto; font-weight: 400; font-size: 13px;">
                    100% increase in dry beans supply (85 tons) by the year 2025;
                    <br>10% of members developed as entrepreneurs by the year 2025;
                    <br>Gradual increase in profit every year to hit 400% (2M) to sustain bankability and business <br>
                    viability by the year 2025.
                    <br>
                    <br>
                    <br>
                </p>
            </div>
            <div class="downlogo"
                style="display: flex; justify-content: space-between; align-items: center; padding: 10px; margin-bottom: 10px;">
                <p
                    style="font-size: 16px; font-weight: bold; font-family: Poppins; font-weight: bold; font-size:14px; cursor: pointer;">
                    Download Mobile App</p>
                <div style="display: flex; gap: 10px;">
                    <img src="{{ asset('icons/dost.png') }}" alt="DOST Logo" style="width: 52px; height: 52px;">
                    <img src="{{ asset('icons/usep.png') }}" alt="USeP Logo" style="width: 52px; height: 52px;">
                </div>
            </div>

        </div>


        <div class="right-side">
            <h1 style="font-family: 'Popins', sans-serif; font-size: 32px; font-weight: 700; margin-left: 9rem;">Welcome
            </h1>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <div class="input-container">
                        <p style="color: #E98E15; font-weight: 700; margin: 0;">Username</p>
                        <input id="email" type="email" name="email" placeholder="Your username" autofocus
                            required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-container">
                        <p style="color: #E98E15; font-weight: 700; margin: 0;">Password</p>
                        <input id="password" type="password" name="password" placeholder="Your password" required>
                    </div>
                </div>

                <div class="rememberMeContainer">
                    <div class="rememberMe">
                        <input type="checkbox" id="check">
                        <label for="check" class="button"></label>
                    </div>
                    <p class="rememberMeText">Remember me</p>
                    <a href="#"
                        style="color: #E98E15; font-weight: 600; font-size: 12px; margin: 0; margin-left: 34%;">Forgot
                        password?</a>
                </div>
                <button type="submit">{{ __('LOGIN') }}</button>
            </form>
            <p id="sign-up" style="font-family: 'Popins', sans-serif; color: #959595; margin-left: 15%;">Don’t have an
                account? <a href="{{ route('admin.register.step1') }}">Sign up.</a></p>
            <div class="social-icons">
                <!-- Add social login buttons here if needed -->
            </div>
        </div>
    </div>

    <script src="https://www.gstatic.com/firebasejs/7.14.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.14.0/firebase-auth.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        // Initialize Firebase
        var firebaseConfig = {
            apiKey: "AIzaSyBF5fJhMz3P07u-_IczFsByt7Qi5Bv_ZEQ",
            authDomain: "cacaotrace-f69ac.firebaseapp.com",
            databaseURL: "https://cacaotrace-f69ac-default-rtdb.asia-southeast1.firebasedatabase.app",
            projectId: "cacaotrace-f69ac",
            storageBucket: "cacaotrace-f69ac.appspot.com",
            messagingSenderId: "894022787423",
            appId: "1:894022787423:web:2fcec7373e8fd5a1a2d6ea",
            measurementId: "G-D6JYVLQD84"
        };
        firebase.initializeApp(firebaseConfig);

        var facebookProvider = new firebase.auth.FacebookAuthProvider();
        var googleProvider = new firebase.auth.GoogleAuthProvider();
        var facebookCallbackLink = '/login/facebook/callback';
        var googleCallbackLink = '/login/google/callback';

        async function socialSignin(provider) {
            var socialProvider = null;
            if (provider == "facebook") {
                socialProvider = facebookProvider;
                document.getElementById('social-login-form').action = facebookCallbackLink;
            } else if (provider == "google") {
                socialProvider = googleProvider;
                document.getElementById('social-login-form').action = googleCallbackLink;
            } else {
                return;
            }
            firebase.auth().signInWithPopup(socialProvider).then(function(result) {
                result.user.getIdToken().then(function(result) {
                    document.getElementById('social-login-tokenId').value = result;
                    document.getElementById('social-login-form').submit();
                });
            }).catch(function(error) {
                // do error handling
                console.log(error);
            });
        }
    </script>
</body>

</html>
