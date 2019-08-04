var app=angular.module("myApp",[]);
app.controller("userController",function($scope,$http){
    $scope.btnName="Insert";
    $scope.displayData=function(){
      $http.get("select.php")
      .then(function(response){
        $scope.names = response.data.records;
      });
    }
    $scope.updateData=function(id,fName,lName){
      $scope.id=id;
      $scope.fName=fName;
      $scope.lName=lName;
      $scope.btnName="Update";
    }
    $scope.deleteData=function(id){
      $scope.id=id;
      swal({
          title: "Are you sure?",
          text: "Confirm Delete Record!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Yes, delete it!",
          closeOnConfirm: false
        },
        function(){
          $http.post('delete.php',{'id':$scope.id}).then(function(data){
                  swal("Deleted!", "Your record has been deleted.", "success");
                  $scope.displayData();
          });
        });
    }
    $scope.insertData = function(){
          if($scope.fName==null){
            sweetAlert("FirstName Require","Error","error");
            return false;
          }
          if($scope.lName==null){
            sweetAlert("LastName Require","Error","error");
            return false;
          }else{
           $http.post(
                "insert.php",
                {'fName':$scope.fName, 'lName':$scope.lName,'id':$scope.id,'btnName':$scope.btnName}
           ).then(function(data){
                sweetAlert("Data Complete","insert data","success");
                $scope.fName = null;
                $scope.lName = null;
                $scope.btnName="Insert";
                $scope.displayData();
           });
         }
      }
});
