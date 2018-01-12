(function(){
  //funktion till att hämta data
  //func-variabel för callback
  function getjson(url,func){
    if(typeof url!=="string" || typeof func!=="function")return false;
    //ajax promise
    return new Promise(function(resolve,reject){
      let x=new XMLHttpRequest();
      //.onload är samma som .onreadystatechange
      x.onload=function(){
        //4 = DONE
        if(x.readyState==4){
          if(x.status==200){
            //egen funktion
            func(JSON.parse(x.response));
            resolve(x.response);
          }else reject("Data kunde inte hämtas. "+x.responseText);
        }
      }
      x.open("GET",url,true);
      x.send();
    });
  }

  let total=0;

  //XHR för info
  //json-server
  getjson("http://localhost:3000/info",function(data){
    total=data.totalNumberOfApplicants;
    //rubrik
    let out=`<h1>Antagningsstatistik</h1>`+
      `<h2>${data.nameOfProgram} ${data.timePeriod}</h2>`+
      `<p><b>Totalt antal ansökningar: ${data.totalNumberOfApplicants}</b></p>`;
    document.getElementById("infotest").innerHTML=out;
  });

  //XHR för schools
  //json-server
  getjson("http://localhost:3000/schools",function(data){
    
    //avrunda i decimaler
    function decimals(a,n){
      return Math.round(a*Math.pow(10,n))/Math.pow(10,n);
    }

    function polarToCartesian(centerX, centerY, radius, angleInDegrees){
      let angleInRadians = (angleInDegrees-90) * Math.PI / 180.0;
      return {
        x: centerX + (radius * Math.cos(angleInRadians)),
        y: centerY + (radius * Math.sin(angleInRadians))
      };
    }

    function describeArc(x, y, radius, startAngle, endAngle){
      let start = polarToCartesian(x, y, radius, endAngle),
        end = polarToCartesian(x, y, radius, startAngle),
        largeArcFlag = endAngle - startAngle <= 180 ? "0" : "1";
      return [
        //moveTo startpunkt
        "M", decimals(start.x,2), decimals(start.y,2),
        //ellipticalArc
        "A", radius, radius, 0, largeArcFlag, 0, decimals(end.x,2), decimals(end.y,2),
        //lineTo mittpunkt
        "L", x, y
      ].join(" ");
    }

    let center=150,
        radius=100,
        margin=20,
        out=`<svg class="data-visuals" viewBox="0 0 ${center*2} ${center*2}" width="${center*2}" height="${center*2}">`,
      currentPercentage=0;

    for(let a=0,b=data.length;a<b;a++){
      let applicants=data[a].totalApplicants,
        //procent i grader
        percentage=Math.round((applicants/total)*360);
      out+=`<g>`+
        `<path d="${describeArc(center,center,radius,currentPercentage,currentPercentage+percentage)}" fill="#139" stroke="#FFF" stroke-width="1" data-name="${data[a].name}" data-total="${applicants}"/>`+
        `<text x="${Math.sin((currentPercentage+percentage/2)/180*Math.PI)*(radius+margin)+center}"
               y="${-Math.cos((currentPercentage+percentage/2)/180*Math.PI)*(radius+margin)+center}">
          ${applicants}
        </text>`+
      `</g>`;
      currentPercentage+=percentage;
    }
    out+=`</svg>`;
    document.getElementById("datatest").innerHTML=out;
  });
})();