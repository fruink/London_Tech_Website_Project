(function () {
    var wimg1 = document.querySelector('#minwageimg');
    var wimg2 = document.querySelector('#housingimg');
    var wimg3 = document.querySelector('#jobsimg');
    var wimg4 = document.querySelector('#educationimg');
    var whyImgs = [wimg1,wimg2,wimg3,wimg4];
    var wtitle1 = document.querySelector('#title1');
    var wtitle2 = document.querySelector('#title2');
    var wtitle3 = document.querySelector('#title3');
    var wtitle4 = document.querySelector('#title4');
    var whyTitles = [wtitle1,wtitle2,wtitle3,wtitle4];
    var wdesc1 = document.querySelector('#words1');
    var wdesc2 = document.querySelector('#words2');
    var wdesc3 = document.querySelector('#words3');
    var wdesc4 = document.querySelector('#words4');
    var whyDescs = [wdesc1,wdesc2,wdesc3,wdesc4];
    var jobThumbs = document.querySelectorAll('.hiring');
  
    function loadSplash(){
      const url = '../ledc_site_copy/admin/phpscripts/connect.php?splash=true';
      fetch(url)
        .then((resp) => resp.json())
        .then((data) => { processResultSplash(data); })
        .catch(function(error) {
          console.log(error);
        });
    }
  
    function processResultSplash(data){
      const { splash_video } = data[0];
      let splashVideo = document.querySelector('#backgroundVideo').src = "assets/" + splash_video;
    }
  
    function loadAbout(){
      const url = '../ledc_site_copy/admin/phpscripts/connect.php?about=true';
      fetch(url)
        .then((resp) => resp.json())
        .then((data) => { processResultAbout(data); })
        .catch(function(error) {
          console.log(error);
        });
    }
  
    function processResultAbout(data){
      const { about_desc, about_img} = data[0];
      let aboutext = document.querySelector('#paragraph').innerHTML = about_desc;
      let aboutimage = document.querySelector('#map').src = 'img/'+about_img
    }
  
    function loadWhy(){
      const url = '../ledc_site_copy/admin/phpscripts/connect.php?why=true';
      fetch(url)
        .then((resp) => resp.json())
        .then((data) => { processResultWhy(data); })
        .catch(function(error) {
          console.log(error);
        });
    }
  
    function processResultWhy(data){
      for (i = 0; i < data.length; i++) {
        const {why_desc} = data[i];
        whyDescs[i].innerHTML = why_desc
      }
    }
  
    function loadJobs(){
      const url = '../ledc_site_copy/admin/phpscripts/connect.php?jobs=true';
      fetch(url)
        .then((resp) => resp.json())
        .then((data) => { processResultJobs(data); })
        .catch(function(error) {
          console.log(error);
        });
  
    }
  
    function processResultJobs(data){
      for (i = 0; i < data.length; i++) {
        const {job_img} = data[i];
        jobThumbs[i].src = 'img/'+job_img;
      }
    }
  
    function loadVideo(){
      const url = '../ledc_site_copy/admin/phpscripts/connect.php?video=true';
      fetch(url)
        .then((resp) => resp.json())
        .then((data) => { processResultVideo(data); })
        .catch(function(error) {
          console.log(error);
        });
    }
  
    function processResultVideo(data){
      const {video_src} = data;
      document.querySelector('#mainVideo').src = 'assets/'+video_src;
    }
  
    function loadNews(){
      const url = '../ledc_site_copy/admin/phpscripts/connect.php?news=true';
      fetch(url)
        .then((resp) => resp.json())
        .then((data) => { processResultNews(data); })
        .catch(function(error) {
          console.log(error);
        });
    }
  
    function processResultNews(data){
      const {news_title, news_post, news_img} = data;
      document.querySelector('#articleTitle').innerHTML = news_title;
      document.querySelector('#post').innerHTML = news_post;
      document.querySelector('#newsImage').src = 'img/'+news_img;
    }
  
    window.addEventListener('load', loadSplash, false);
    window.addEventListener('load', loadAbout, false);
    window.addEventListener('load', loadWhy, false);
    window.addEventListener('load',loadVideo,false);
    window.addEventListener('load',loadNews, false);
    window.addEventListener('load', loadJobs, false);
  
  })();
  