var byId=function(a){
	return document.getElementById(a);
},
target = function(e){
	return e.target?e.target:e.srcElement;
},
sortTable=function(tbody, col, asc) {
	var rows = tbody[0].rows, rlen = rows.length, arr = [], i, j, cells, clen;
    // fill the array with values from the table
    for(i = 0; i < rlen; i++){
	    cells = rows[i].cells;
	    clen = cells.length;
	    arr[i] = [];
	    for(j = 0; j < clen; j++){
	    	arr[i][j] = cells[j].innerHTML;
	    }
    }
    // sort the array by the specified column number (col) and order (asc)
    arr.sort(function(a, b){
        return (a[col] == b[col]) ? 0 : ((a[col] > b[col]) ? asc : -1*asc);
    });
    for(i = 0; i < rlen; i++){
        arr[i] = "<td>"+arr[i].join("</td><td>")+"</td>";
    }
    tbody[0].innerHTML = "<tr>"+arr.join("</tr><tr>")+"</tr>";
}
window.onmousemove=function(e){
	var a=target(e), t=a.title, l=t.length;
	byId('toolbarText').textContent=l>0?t:"";
};
window.onload=function(){
	$('table th').each(function(){
		$(this).click(function(){
			var th=$(this),currentCase=th.attr('class'),cell=this.cellIndex;
			$('table th').each(function(){
				$(this).removeClass('sortDesc');
				$(this).removeClass('sortAsc');
			});
			if(currentCase.length>0&&currentCase=="sortDesc"){
				th.addClass("sortAsc");
				sortTable($('table>tbody'),cell,1);
			}else{
				th.addClass("sortDesc");
				sortTable($('table>tbody'),cell,-1);
			}
		});
	});
};
