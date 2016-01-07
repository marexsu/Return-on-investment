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
            var conversion_rate = $("#conversionRate").text();
            var paid_income = $("#paidPercentage").text();
            var average_order = $("#averageOrder").val();
            var addword_percentage = $("#addwordPercentage").val();
            console.log(avarage_cpc);
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
                if(avarage_cpc<=result.budget_cpc){
                    $("#sufficientBudget").css({"color":"green"}).text("Your budget is sufficient!");
                }else{
                    $("#sufficientBudget").css({"color":"red"}).text("Your budget is insufficient!");
                }
            })
        })
        $("#budgetAmount1").change(function(){
            var budgetAmount = $("#budgetAmount1").val();
            var objectiveAmount = $("#objectiveAmount").val();
            var boughtTextVisitors = $("#boughtTextVisitors").text();
            var avarageCPC = $("#avarageCPC").text();
            var budgetCPC = parseInt($("#budgetCPC").text());
            var function_n = 2;
            console.log(function_n);
            $.ajax({
                data: { "boughtTextVisitors" : boughtTextVisitors , "budgetAmount" : budgetAmount , "objectiveAmount" : objectiveAmount , "function_n" : function_n},
                url: "ajax.php",
                method: "POST",
                dataType: "JSON"
            }).success(function(result) {
                $("#budgetPercentage").val(result.budgetPercentage);
                $("#budgetAmount2").text(budgetAmount);
                $('#budgetCPC').text(result.budgetCPC);
                if(avarageCPC<=result.budgetCPC){
                    $("#sufficientBudget").css({"color":"green"}).text("Your budget is sufficient!");
                }else{
                    $("#sufficientBudget").css({"color":"red"}).text("Your budget is insufficient!");
                }
            })
        })
        $("#averageOrder , #objectiveAmount , #conversionRate").change(function(){
            var averageOrder = $("#averageOrder").val();
            var objectiveAmount = $("#objectiveAmount").val();
            var conversionRate = $("#conversionRate").val();
            var addwordPercentage = $("#addwordPercentage").val();
            var paidPercentage = $("#paidPercentage").val();
            var addWordPossibility = parseInt($("#addWordPossibility").text());
            var avarageCPC = $("#avarageCPC").text();
            var budgetCPC = parseInt($("#budgetCPC").text());
            var function_n = 3;
            console.log(function_n);
            $.ajax({
                data: {"addWordPossibility" : addWordPossibility ,  "averageOrder" : averageOrder , "objectiveAmount" : objectiveAmount , "conversionRate" : conversionRate  , "paidPercentage" : paidPercentage , "addwordPercentage" : addwordPercentage ,  "function_n" : function_n},
                url: "ajax.php",
                method: "POST",
                dataType: "JSON"
            }).success(function(result) {
                $('.nOfVisitors').text(result.nOfVisitors);
                $('#visitorsText').text(result.nOfVisitors);
                $('.boughtTextVisitors').text(result.boughtTextVisitors);
                $('#requestedOrder').text(result.requestedOrder);
                $('.addWordVisitors').text(result.addWordVisitors);
                if(result.addWordPossibilityText=="It is possible!"){
                    $("#addWordPossibilityText").css({"color":"green"}).text(result.addWordPossibilityText);
                }else {
                    $("#addWordPossibilityText").css({"color":"red" }).text(result.addWordPossibilityText);
                }
                if(avarageCPC<=budgetCPC){
                    $("#sufficientBudget").css({"color":"green"}).text("Your budget is sufficient!");
                }else{
                    $("#sufficientBudget").css({"color":"red"}).text("Your budget is insufficient!");
                }
            })
        })
        $("#googlePercentage , #directlyPercentage , #paidPercentage , #unpaidPercentage , #addwordPercentage").change(function(){
            var googlePercentage = $("#googlePercentage").val();
            var directlyPercentage = $("#directlyPercentage").val();
            var paidPercentage = $("#paidPercentage").val();
            var unpaidPercentage = $("#unpaidPercentage").val();
            var addwordPercentage = $("#addwordPercentage").val();
            var nOfVisitors = parseInt($("#nOfVisitors").text());
            var budgetAmount = $("#budgetAmount1").val();
            var addWordPossibility = parseInt($("#addWordPossibility").text());
            var avarageCPC = $("#avarageCPC").text();
            var function_n = 4;
            console.log(function_n);
            console.log(addWordPossibility);
            $.ajax({
                data: {"addWordPossibility" : addWordPossibility , "budgetAmount" : budgetAmount , "googlePercentage" : googlePercentage , "directlyPercentage" : directlyPercentage , "paidPercentage" : paidPercentage , "unpaidPercentage" : unpaidPercentage , "addwordPercentage" : addwordPercentage , "nOfVisitors" : nOfVisitors ,  "function_n" : function_n},
                url: "ajax.php",
                method: "POST",
                dataType: "JSON"
            }).success(function(result) {
                if(result.remainingPercentage==0){
                    $("#remainingPercentageDiv").css({"border":"1px solid green"});
                }else {
                    $("#remainingPercentageDiv").css({"border":"1px solid red" });
                }
                $("#remainingPercentage").val(result.remainingPercentage);
                $('.addwordTextPercentage').text(addwordPercentage);
                $('#paidTextPercentage').text(paidPercentage);
                $('#togetherTextPercentage1').text(result.togetherTextPercentage);
                $('#togetherTextPercentage2').text(result.togetherTextPercentage);
                $('.boughtTextVisitors').text(result.boughtTextVisitors);
                $('#budgetCPC').text(result.budgetCPC);
                $('.addWordVisitors').text(result.addWordVisitors);
                if(result.addWordPossibilityText=="It is possible!"){
                    $("#addWordPossibilityText").css({"color":"green"}).text(result.addWordPossibilityText);
                }else {
                    $("#addWordPossibilityText").css({"color":"red" }).text(result.addWordPossibilityText);
                }
                if(avarageCPC<=result.budgetCPC){
                    $("#sufficientBudget").css({"color":"green"}).text("Your budget is sufficient!");
                }else{
                    $("#sufficientBudget").css({"color":"red"}).text("Your budget is insufficient!");
                }
            })
        })
    })