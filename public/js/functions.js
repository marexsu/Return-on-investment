    $(document).ready(function(){
        $("#checkbox1").change(function(){
            if($(this).is(":checked")) {
                console.log($(this));
                $("#conversion_rate").val(10);
            }
        })
        $("#budget_percentage , #objective_amount").change(function(){
            var budget_percentage = $("#budget_percentage").val();
            var objective_amount = $("#objective_amount").val();
            var avarage_cpc = $("#avarage_cpc").text();
            var conversion_rate = $("#conversion_rate").val();
            var paid_income = $("#paid_percentage").val();
            var average_order = $("#average_order").val();
            var addword_percentage = $("#addword_percentage").val();

            $.ajax({
                data: { "budget_percentage" : budget_percentage , "objective_amount" : objective_amount , "conversion_rate" : conversion_rate , "paid_income" : paid_income , "addword_percentage" : addword_percentage , "average_order" : average_order},
                url: "/budget",
                method: "POST",
                dataType: "JSON"
            }).success(function(result) {
                $("#budget_amount_1").val(result.budget_amount);
                $("#budget_amount_2").text(result.budget_amount);
                $('#budget_cpc').text(result.budget_cpc);
                console.log(avarage_cpc);
                console.log(result.budget_cpc);
                if(avarage_cpc<=result.budget_cpc){
                    $("#sufficient_budget").css({"color":"green"}).text("Your budget is sufficient!");
                }else{
                    $("#sufficient_budget").css({"color":"red"}).text("Your budget is insufficient!");
                }
            })
        })
        $("#budget_amount_1").change(function(){
            var budget_amount = $("#budget_amount_1").val();
            var objective_amount = $("#objective_amount").val();
            var conversion_rate = $("#conversion_rate").val();
            var avarage_cpc = $("#avarage_cpc").text();
            var paid_percentage = $("#paid_percentage").val();
            var addword_percentage = $("#addword_percentage").val();
            var average_order = $("#average_order").val();

            $.ajax({
                data: { "average_order" : average_order , "addword_percentage" : addword_percentage , "paid_income" : paid_percentage , "conversion_rate" : conversion_rate , "budget_amount" : budget_amount , "objective_amount" : objective_amount },
                url: "/budget_amount",
                method: "POST",
                dataType: "JSON"
            }).success(function(result) {
                $("#budget_percentage").val(result.budget_percentage);
                $("#budget_amount_2").text(budget_amount);
                $('#budget_cpc').text(result.budget_cpc);
                if(avarage_cpc<=result.budget_cpc){
                    $("#sufficient_budget").css({"color":"green"}).text("Your budget is sufficient!");
                }else{
                    $("#sufficient_budget").css({"color":"red"}).text("Your budget is insufficient!");
                }
            })
        })
        $("#average_order , #objective_amount , #conversion_rate , #average_order , #conversion_rate").change(function(){
            var average_order = $("#average_order").val();
            var objective_amount = $("#objective_amount").val();
            var conversion_rate = $("#conversion_rate").val();
            var addword_percentage = $("#addword_percentage").val();
            var paid_percentage = $("#paid_percentage").val();
            var addWord_possibility = parseInt($("#addword_possibility").text());
            var avarage_cpc = $("#avarage_cpc").text();
            var budget_cpc = parseFloat($("#budget_cpc").text());

            $.ajax({
                data: {"addWord_possibility" : addWord_possibility ,  "average_order" : average_order , "objective_amount" : objective_amount , "conversion_rate" : conversion_rate  , "paid_percentage" : paid_percentage , "addword_percentage" : addword_percentage },
                url: "/visitors_cloud",
                method: "POST",
                dataType: "JSON"
            }).success(function(result) {
                $('.n_of_visitors').text(result.visitors);
                $('#visitors_text').text(result.visitors);
                $('.bought_text_visitors').text(result.bought_visitors);
                $('#requested_order').text(result.requested_order);
                $('.addword_visitors').text(result.add_word_visitors);
                if(result.addWord_possibility_text=="It is possible!"){
                    $("#addword_possibility_text").css({"color":"green"}).text(result.addWord_possibility_text);
                }else {
                    $("#addword_possibility_text").css({"color":"red" }).text(result.addWord_possibility_text);
                }
                if(avarage_cpc<=budget_cpc){
                    $("#sufficient_budget").css({"color":"green"}).text("Your budget is sufficient!");
                }else{
                    $("#sufficient_budget").css({"color":"red"}).text("Your budget is insufficient!");
                }
            })
        })
        $("#google_percentage , #directly_percentage , #paid_percentage , #unpaid_percentage , #addword_percentage").change(function(){
            var conversion_rate = $("#conversion_rate").val();
            var addWord_possibility = parseInt($("#addword_possibility").text());
            var addword_percentage = $("#addword_percentage").val();
            var objective_amount = $("#objective_amount").val();
            var average_order = $("#average_order").val();
            var budget_percentage = $("#budget_percentage").val();
            var paid_percentage = $("#paid_percentage").val();
            var direct_percentage = $("#directly_percentage").val();
            var google_percentage = $("#google_percentage").val();
            var unpaid_percentage = $("#unpaid_percentage").val();
            var avarage_cpc = $("#avarage_cpc").text();

            $.ajax({
                data: { "unpaid_percentage" : unpaid_percentage , "google_percentage" : google_percentage , "direct_percentage" : direct_percentage , "paid_percentage" : paid_percentage , "budget_percentage" : budget_percentage , "average_order" : average_order , "objective_amount" : objective_amount , "addword_percentage" : addword_percentage , "addWord_possibility" : addWord_possibility , "conversion_rate" : conversion_rate},
                url: "/percentage",
                method: "POST",
                dataType: "JSON"
            }).success(function(result) {
                if(result.remaining_percentage==0){
                    $("#remaining_percentage_div").css({"border":"1px solid green"});
                }else {
                    $("#remaining_percentage_div").css({"border":"1px solid red" });
                }
                $("#remaining_percentage").val(result.remaining_percentage);
                $('.addwordTextPercentage').text(addword_percentage);
                $('#paid_text_percentage').text(paid_percentage);
                $('#together_text_percentage_1').text(result.together_text_percentage);
                $('#together_text_percentage_2').text(result.together_text_percentage);
                $('.bought_text_visitors').text(result.bought_visitors);
                $('#budget_cpc').text(result.budget_cpc);
                $('.addword_visitors').text(result.add_word_visitors);
                if(result.addWord_possibility_text=="It is possible!"){
                    $("#addword_possibility_text").css({"color":"green"}).text(result.addWord_possibility_text);
                }else {
                    $("#addword_possibility_text").css({"color":"red" }).text(result.addWord_possibility_text);
                }
                if(avarage_cpc<=result.budget_cpc){
                    $("#sufficient_budget").css({"color":"green"}).text("Your budget is sufficient!");
                }else{
                    $("#sufficient_budget").css({"color":"red"}).text("Your budget is insufficient!");
                }
            })
        })
    })