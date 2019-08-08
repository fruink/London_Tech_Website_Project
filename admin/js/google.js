gapi.analytics.ready(function() {
  
  //Dashboard requires ledc google analytics client id to function
  //Code was successfully tested using back end developers analytics client id
  //Client Id was removed before submission because he didn't want to give out his analytics information
    gapi.analytics.auth.authorize({
        container: 'embed-api-auth-container',
        clientid: 'LEDC Client ID'
    });

    var viewSelector1 = new gapi.analytics.ViewSelector({
        container: 'view-selector-1-container'
    });
    var viewSelector2 = new gapi.analytics.ViewSelector({
        container: 'view-selector-2-container'
    });

    var viewSelector3 = new gapi.analytics.ViewSelector({
        container: 'view-selector-3-container'
    });

    var viewSelector4 = new gapi.analytics.ViewSelector({
        container: 'view-selector-4-container'
    });

    viewSelector1.execute();
    viewSelector2.execute();
    viewSelector3.execute();
    viewSelector4.execute();

    var dataChart1 = new gapi.analytics.googleCharts.DataChart({
        query: {
            metrics: 'ga:sessions',
            dimensions: 'ga:date',
            'start-date': '7daysAgo',
            'end-date': 'yesterday'
        },
        chart: {
            container: 'chart-1-container',
            type: 'LINE',
            options: {
                width: '100%'
            }
        }
    });

    var dataChart2 = new gapi.analytics.googleCharts.DataChart({
        query: {
            metrics: 'ga:sessions',
            dimensions: 'ga:language',
            'start-date': '7daysAgo',
            'end-date': 'yesterday',
            'max-results': 12,
            sort: '-ga:sessions'
      },
      chart: {
        container: 'chart-2-container',
        type: 'PIE',
        options: {
          width: '100%',
        }
      }
    });

    var dataChart3 = new gapi.analytics.googleCharts.DataChart({
      query: {
        metrics: 'ga:sessions',
        dimensions: 'ga:userType',
        'start-date': '7daysAgo',
        'end-date': 'yesterday',
        'max-results': 12,
        sort: '-ga:sessions'
      },
      chart: {
        container: 'chart-3-container',
        type: 'PIE',
        options: {
          width: '100%',
          pieHole: 4/9
        }
      }
    });

    var dataChart4 = new gapi.analytics.googleCharts.DataChart({
      query: {
        metrics: 'ga:bounceRate',
        dimensions: 'ga:date',
        'start-date': '7daysAgo',
        'end-date': 'yesterday'
      },
      chart: {
        container: 'chart-4-container',
        type: 'LINE',
        options: {
          width: '100%'
        }
      }
    });

    viewSelector1.on('change', function(ids) {
      dataChart1.set({query: {ids: ids}}).execute();
    });

    viewSelector2.on('change', function(ids) {
      dataChart2.set({query: {ids: ids}}).execute();
    });

    viewSelector3.on('change', function(ids) {
      dataChart3.set({query: {ids: ids}}).execute();
    });

    viewSelector4.on('change', function(ids) {
      dataChart4.set({query: {ids: ids}}).execute();
    });
  
  });