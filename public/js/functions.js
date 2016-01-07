    $(document).ready(function(){
        $("#checkbox1").change(function(){
            if($(this).is(":checked")) {
                console.log($(this));
                $("#conversionRate").val(10);
            }
        })
        $("#budgetPercentage , #objectiveAmount").change(function(){
            var budget_percentage = $("#budgetPercentage").val();
            var objective_amount = $("#objectiveAmount").val();
            var avarage_cpc = $("#avarageCPC").text();
            var conversion_rate = $("#conversionRate").val();
            var paid_income = $("#paidPercentage").val();
            var average_order = $("#averageOrder").val();
            var addword_percentage = $("#addwordPercentage").val();
            $.ajax({
                data: { "budget_percentage" : budget_percentage , "objective_amount" : objective_amount , "conversion_rate" : conversion_rate , "paid_income" : paid_income , "addword_percentage" : addword_percentage , "average_order" : average_order},
                url: "/budget",
                method: "POST",
                dataType: "JSON"
            }).success(function(result) {
                $("#budgetAmount1").val(result.budget_amount);
                $("#budgetAmount2").text(result.budget_amount);
                $('#budgetCPC').text(result.budget_cpc);
                console.log(avarage_cpc);
                console.log(result.budget_cpc);
                if(avarage_cpc<=result.budget_cpc){
                    $("#sufficientBudget").css({"color":"green"}).text("Your budget is sufficient!");
                }else{
                    $("#sufficientBudget").css({"color":"red"}).text("Your budget is insufficient!");
                }
            })
        })
        $("#budgetAmount1").change(function(){
            var budget_amount = $("#budgetAmount1").val();
            var objective_amount = $("#objectiveAmount").val();
            var conversion_rate = $("#conversionRate").val();
            var avarage_cpc = $("#avarageCPC").text();
            var paid_percentage = $("#paidPercentage").val();
            var addword_percentage = $("#addwordPercentage").val();
            var average_order = $("#averageOrder").val();
            console.log(budget_amount);
            $.ajax({
                data: { "average_order" : average_order , "addword_percentage" : addword_percentage , "paid_income" : paid_percentage , "conversion_rate" : conversion_rate , "budget_amount" : budget_amount , "objective_amount" : objective_amount },
                url: "/budget_amount",
                method: "POST",
                dataType: "JSON"
            }).success(function(result) {
                $("#budgetPercentage").val(result.budget_percentage);
                $("#budgetAmount2").text(budget_amount);
                $('#budgetCPC').text(result.budget_cpc);
                if(avarage_cpc<=result.budget_cpc){
                    $("#sufficientBudget").css({"color":"green"}).text("Your budget is sufficient!");
                }else{
                    $("#sufficientBudget").css({"color":"red"}).text("Your budget is insufficient!");
                }
            })
        })
        $("#averageOrder , #objectiveAmount , #conversionRate").change(function(){
            var average_order = $("#averageOrder").val();
            var objective_amount = $("#objectiveAmount").val();
            var conversion_rate = $("#conversionRate").val();
            var addword_percentage = $("#addwordPercentage").val();
            var paid_percentage = $("#paidPercentage").val();
            var addWord_possibility = parseInt($("#addWordPossibility").text());
            var avarage_cpc = $("#avarageCPC").text();
            var budget_cpc = parseInt($("#budgetCPC").text());
            console.log(addWord_possibility);
            $.ajax({
                data: {"addWord_possibility" : addWord_possibility ,  "average_order" : average_order , "objective_amount" : objective_amount , "conversion_rate" : conversion_rate  , "paid_percentage" : paid_percentage , "addword_percentage" : addword_percentage },
                url: "/visitors_cloud",
                method: "POST",
                dataType: "JSON"
            }).success(function(result) {
                $('.nOfVisitors').text(result.visitors);
                $('#visitorsText').text(result.visitors);
                $('.boughtTextVisitors').text(result.bought_visitors);
                $('#requestedOrder').text(result.requested_order);
                $('.addWordVisitors').text(result.add_word_visitors);
                if(result.addWord_possibility_text=="It is possible!"){
                    $("#addWordPossibilityText").css({"color":"green"}).text(result.addWord_possibility_text);
                }else {
                    $("#addWordPossibilityText").css({"color":"red" }).text(result.addWord_possibility_text);
                }
                if(avarage_cpc<=budget_cpc){
                    $("#sufficientBudget").css({"color":"green"}).text("Your budget is sufficient!");
                }else{
                    $("#sufficientBudget").css({"color":"red"}).text("Your budget is insufficient!");
                }
            })
        })
        $("#googlePercentage , #directlyPercentage , #paidPercentage , #unpaidPercentage , #addwordPercentage").change(function(){
            var conversion_rate = $("#conversionRate").val();
            var addWord_possibility = parseInt($("#addWordPossibility").text());
            var addword_percentage = $("#addwordPercentage").val();
            var objective_amount = $("#objectiveAmount").val();
            var average_order = $("#averageOrder").val();
            var budget_percentage = $("#budgetPercentage").val();
            var paid_percentage = $("#paidPercentage").val();
            var direct_percentage = $("#directlyPercentage").val();
            var google_percentage = $("#googlePercentage").val();
            var unpaid_percentage = $("#unpaidPercentage").val();
            var avarage_cpc = $("#avarageCPC").text();



            $.ajax({
                data: { "unpaid_percentage" : unpaid_percentage , "google_percentage" : google_percentage , "direct_percentage" : direct_percentage , "paid_percentage" : paid_percentage , "budget_percentage" : budget_percentage , "average_order" : average_order , "objective_amount" : objective_amount , "addword_percentage" : addword_percentage , "addWord_possibility" : addWord_possibility , "conversion_rate" : conversion_rate},
                url: "/percentage",
                method: "POST",
                dataType: "JSON"
            }).success(function(result) {
                if(result.remaining_percentage==0){
                    $("#remainingPercentageDiv").css({"border":"1px solid green"});
                }else {
                    $("#remainingPercentageDiv").css({"border":"1px solid red" });
                }
                $("#remainingPercentage").val(result.remaining_percentage);
                $('.addwordTextPercentage').text(addword_percentage);
                $('#paidTextPercentage').text(paid_percentage);
                $('#togetherTextPercentage1').text(result.together_text_percentage);
                $('#togetherTextPercentage2').text(result.together_text_percentage);
                $('.boughtTextVisitors').text(result.bought_visitors);
                $('#budgetCPC').text(result.budget_cpc);
                $('.addWordVisitors').text(result.add_word_visitors);
                if(result.addWord_possibility_text=="It is possible!"){
                    $("#addWordPossibilityText").css({"color":"green"}).text(result.addWord_possibility_text);
                }else {
                    $("#addWordPossibilityText").css({"color":"red" }).text(result.addWord_possibility_text);
                }
                if(avarage_cpc<=result.budget_cpc){
                    $("#sufficientBudget").css({"color":"green"}).text("Your budget is sufficient!");
                }else{
                    $("#sufficientBudget").css({"color":"red"}).text("Your budget is insufficient!");
                }
            })
        })
    })