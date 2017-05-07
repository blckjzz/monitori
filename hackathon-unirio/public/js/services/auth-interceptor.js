app.factory('Interceptor', Interceptor);
	
	Interceptor.$inject = ['$q'];
	
	function Interceptor($q) {
        
        var authData = localStorage.getItem('Authorization');
        return {
			request: function(config) {											
				config.headers['Authorization'] = "Bearer " + authData;				
				return config;
			},
			responseError: function(error) {
				if (error.status === 401 || error.status === 403) {
					$window.location.href = '#/';
				}
				return $q.reject(error);
			}
		};

    }