app.controller('workersController', function($scope, $http, API_URL) {
    //retrieve workers listing from API
    $http.get(API_URL + "workers")
            .success(function(response) {
                $scope.workers = response;
                console.log(response);
            });
    
    //show modal form
    $scope.toggle = function(modalstate, id) {
        $scope.modalstate = modalstate;

        switch (modalstate) {
            case 'add':
                $scope.form_title = "Add New Worker";
                break;
            case 'edit':
                $scope.form_title = "Worker Detail";
                $scope.id = id;
                $http.get(API_URL + 'workers/' + id)
                        .success(function(response) {
                            console.log(response);
                            $scope.worker = response;
                            console.log($scope.worker);
                        });
                break;
            default:
                break;
        }
        console.log(id);
        $('#myModal').modal('show');
    }

    //save new record / update existing record
    $scope.save = function(modalstate, id) {
        var url = API_URL + "workers";
        
        //append worker id to the URL if the form is in edit mode
        if (modalstate === 'edit'){
            url += "/" + id;
        }
        
        $http({
            method: 'POST',
            url: url,
            data: $.param($scope.worker),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function(response) {
            $scope.workers=response;
            console.log(response);
            location.reload();
        }).error(function(response) {
            console.log(response);
            //alert('This is embarassing. An error has occured. Please check the log for details');
        console.log("hay un error");
        });
    }

    //delete record
    $scope.confirmDelete = function(id) {
        var isConfirmDelete = confirm('Are you sure you want this record?');
        if (isConfirmDelete) {
            $http({
                method: 'DELETE',
                url: API_URL + 'workers/' + id
            }).
                    success(function(data) {
                        console.log(data);
                        location.reload();
                    }).
                    error(function(data) {
                        console.log(data);
                        alert('Unable to delete');
                    });
        } else {
            return false;
        }
    }
    
});