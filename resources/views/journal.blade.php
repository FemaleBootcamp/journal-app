
<!DOCTYPE html>

<html lang="en">

<head>


    <link rel="stylesheet" type="text/css" href="css/app.css">


    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


</head>

<body>

    <div class="root">
        <h1> Records retrieved based on a filter</h1>
        <ul>
            <li v-for="journal in journals" v-text="journal"></li>

        </ul>
    </div>

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="/js/app.js"></script>

</body>

</html>