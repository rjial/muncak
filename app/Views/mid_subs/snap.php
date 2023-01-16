<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-n7p99D1eYiosdMhN"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <title>Snap</title>
</head>

<body id="app">
    <button>

    </button>

</body>
<script defer>
    document.onload = function() {}
    const {
        createApp
    } = Vue
    createApp({
        data() {
            return {

            }
        },
        mounted() {
            this.loadSnap()
        },
        methods: {
            loadSnap() {

                snap.pay('<?= $snapToken ?>', {
                    onSuccess: function(result) {
                        console.log(result)
                    }
                })
            }


        }
    }).mount('#app');
</script>

</html>