
var APP = (function(){

  var fn = {
    
    // 生成短地址
    setUrl: function(self) {
      var urlEl = document.getElementById('url'),
          tips = 'https://',
          request = {
            "url": urlEl.value
          };
      fn.getJson('api/set.php', true, JSON.stringify(request), function(res) {
         if(res.success == 'true') {
          urlEl.className = 'focus';
          urlEl.value = res.content.url;
         } else {
          urlEl.className = '';
          urlEl.value = '';
          urlEl.setAttribute('placeholder', res.content);
          setTimeout(function() {
            urlEl.setAttribute('placeholder', tips);
          }, 2000);
         }
      });
    },
    
    // 获取 JSON 数据
    getJson: function(url, post, data, callback) {
      var xhr = new XMLHttpRequest(),
          type = (post) ? 'POST' : 'GET';
      xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200) {
          var json = JSON.parse(xhr.responseText);
          callback(json);
        } else if(xhr.readyState == 4) {
          callback(false);
        }
      }
      xhr.open(type, url, true);
      xhr.send(data);
    }
    
  },

  init = function() {
    setTimeout(function() {
      var el = document.getElementsByTagName('html')[0];
      el.className = 'on';
    }, 10);
  };

  return {
    fn: fn,
    init: init
  }

})();


document.addEventListener('DOMContentLoaded', function() {
  APP.init();
})