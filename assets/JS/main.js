var navs = document.querySelectorAll('.nav-link');
navs.forEach(item => {
  item.addEventListener('click', event => {
    RemoveActive();
    item.classList.add("active");
    if (item.getAttribute('value') == 'book') {
    window.open(base_url+'Manual.pdf');
    } else {
    LoadHeader(item.getAttribute('value'));
    LoadMain('table', item.getAttribute('value'));
    }
  });
});

function RemoveActive() {
  navs.forEach(function (item, index) {
    item.classList.remove("active");
  });
}

$(document).on("submit", "form", function (e) {
  e.preventDefault();
  var formdata = new FormData(e.originalEvent.srcElement);
  formdata.append(e.originalEvent.submitter.name, true);
  if (e.originalEvent.submitter.name == "CommentStage") {
    formdata.append(e.originalEvent.submitter.name, e.originalEvent.submitter.value);
  }
  $.ajax({
    url: base_url + "App/Request",
    type: 'POST',
    data:formdata,
    processData: false,
    contentType: false,
    success: function (response) {
      if (e.originalEvent.submitter.name == "CommentStage") {
        LoadMain('table', 'comments', e.originalEvent.submitter.value, 'comments');
        $('.msg').val(""); 
      } else {
        $( "#alert" ).empty().append( response );
      }
    }
  });
});

$(document).on("change", "#category", function (event) {
  $.ajax({
    url: base_url + "App/DropdownSubCategory/",
    data:{selected:$('#category').val()},
    type: 'POST',
    success: function (response) {
      $('#subcategory').html(response);
    }
  });
});
// Inventory
$(document).on("click", "#AddItem", function (event) {
  LoadHeader('inventory_back');
  LoadMain('form', 'inventory');
});

$(document).on("click", "#BackItem", function (event) {
  LoadHeader('inventory');
  LoadMain('table', 'inventory');
});

$(document).on("click", "#EditItem", function (event) {
  LoadHeader('inventory_back');
  LoadMain('form', 'inventory_edit', this.getAttribute('value'));
});

$(document).on("click", "#HistoryItem", function (event) {
  LoadHeader('inventory_back');
  LoadMain('table', 'item_history', this.getAttribute('value'));
});

$(document).on("click", "#DeleteItem", function (event) {
  Delete('tbl_inventory', this.getAttribute('value'), 'DeleteItem', 'inventory');
});
// Inventory End

// Category
$(document).on("click", "#AddCategory", function (event) {
  LoadHeader('category_back');
  LoadMain('form', 'category');
});

$(document).on("click", "#BackCategory", function (event) {
  LoadHeader('category');
  LoadMain('table', 'category');
});

$(document).on("click", "#EditCategory", function (event) {
  LoadHeader('category_back');
  LoadMain('form', 'category_edit', this.getAttribute('value'));
});

$(document).on("click", "#DeleteCategory", function (event) {
  Delete('tbl_category', this.getAttribute('value'), 'DeleteCategory', 'category');
});
// Category End

// SubCategory
$(document).on("click", "#AddSubCategory", function (event) {
  LoadHeader('subcategory_back');
  LoadMain('form', 'subcategory');
});

$(document).on("click", "#BackSubCategory", function (event) {
  LoadHeader('subcategory');
  LoadMain('table', 'subcategory');
});

$(document).on("click", "#EditSubCategory", function (event) {
  LoadHeader('subcategory_back');
  LoadMain('form', 'subcategory_edit', this.getAttribute('value'));
});

$(document).on("click", "#DeleteSubCategory", function (event) {
  Delete('tbl_subcategory', this.getAttribute('value'), 'DeleteSubCategory', 'subcategory');
});
// SubCategory End

// Projects
$(document).on("click", "#AddProjects", function (event) {
  LoadHeader('projects_back_only');
  LoadMain('form', 'projects');
});

$(document).on("click", "#BackProjects", function (event) {
  LoadHeader('projects');
  LoadMain('table', 'projects');
});

$(document).on("click", "#BackOnlyProjects", function (event) {
  LoadHeader('projects');
  LoadMain('table', 'projects');
});

$(document).on("click", "#EditProjects", function (event) {
  var ProjectID = this.getAttribute('value');
  LoadHeader('projects_back/'+ProjectID);
  $.when(LoadMain('form', 'projects_edit', ProjectID)).then(function(){
    LoadMain('table', 'project_stages',  ProjectID, 'project_stages');
    LoadMain('table', 'project_history', ProjectID, 'stage_history');
  });
});

$(document).on("click", "#DeleteProjects", function (event) {
  var text = "Confirm Delete Project#"+this.getAttribute('value')+" ?";
  if (confirm(text) == true) {
  Delete('tbl_projects', this.getAttribute('value'), 'DeleteProject', 'projects');
  }
});

$(document).on("click", "#ExportProjects", function (event) {
   var ProjectID = this.getAttribute('value');
  generateProjectPDF(ProjectID);
});

$(document).on("click", "#ViewProjects", function (event) {
  LoadHeader('report_back');
  LoadMain('form', 'projects_edit', this.getAttribute('value'));
});

$(document).on("click", "#BackReport", function (event) {
  LoadHeader('report');
  LoadMain('table', 'report');
});
// Projects End

// Stage
$(document).on("click", "#EditStage", function (event) {
  LoadHeader('projects_back_no_export/'+parseInt($(this).data("project-id")));
  let val = this.getAttribute('value');
  $.when(LoadMain('form', 'stages_edit', val)).then(function(){
    LoadMain('table', 'comments', val, 'comments');
    LoadMain('table', 'stage_history', val, 'stage_history');
  });
});


// Stage End

// Users
$(document).on("click", "#AddUsers", function (event) {
  LoadHeader('users_back');
  LoadMain('form', 'users');
});

$(document).on("click", "#BackUsers", function (event) {
  LoadHeader('users');
  LoadMain('table', 'users');
});

$(document).on("click", "#EditUser", function (event) {
  LoadHeader('users_back');
  LoadMain('form', 'view_user_edit', this.getAttribute('value'));
});

$(document).on("click", "#DeleteUser", function (event) {
  var text = "Confirm Delete User#"+this.getAttribute('value')+" ?";
  if (confirm(text) == true) {
    Delete('tbl_users', this.getAttribute('value'), 'DeleteUser', 'users');
  }
});
// Users End

// Ranks
$(document).on("click", "#AddRank", function (event) {
  LoadHeader('rank_back');
  LoadMain('form', 'rank');
});

$(document).on("click", "#BackRank", function (event) {
  LoadHeader('rank');
  LoadMain('table', 'rank');
});

$(document).on("click", "#EditRank", function (event) {
  LoadHeader('rank_back');
  LoadMain('form', 'rank_edit', this.getAttribute('value'));
});

$(document).on("click", "#DeleteRank", function (event) {
  Delete('tbl_rank', this.getAttribute('value'), 'DeleteRank', 'rank');
});
// Ranks End

// Project Audit
$(document).on("click", "#BackAudit", function (event) {
  LoadHeader('projects');
  LoadMain('table', 'project_audit');
});

$(document).on("click", "#ViewProjectAudit", function (event) {
  var ProjectID = this.getAttribute('value');
  // LoadHeader('projects_back/'+ProjectID);
  $.when(LoadMain('form', 'projects_audit_edit', ProjectID)).then(function(){
    LoadMain('table', 'project_stages',  ProjectID, 'project_stages');
    LoadMain('table', 'project_history', ProjectID, 'stage_history');
  });
});
// Project Audit End

$(document).on("click", ".btn-refresh", function (event) {
  var id = $(this).data("target-id");
  var type = $(this).data("target-type");
  var name = $(this).data("target-name");
  var target = $(this).data("target-div");
  $( "#"+target ).empty().append("<i class='fa fa-refresh fa-spin fa-fw'></i> Loading... ");
  LoadMain(type, name, id, target);
});

function LoadHeader(header, $id = null) {
  $("#header").load(base_url + "App/Header/" + header);
}

function LoadMain(type, name, id = "", target = "main") {
  $( "#"+target ).empty().append("<i class='fa fa-refresh fa-spin fa-fw'></i> Loading... ");
  $.ajax({
    url: base_url + "App/Body/" + type + "/" + name,
    data: {id:id},
    type: 'POST',
    success: function (response) {
      $('#'+target).html(response);
    }
  });
}

function Delete(table, id, button, type){
  var formdata = new FormData();
  formdata.append("table", table);
  formdata.append(button, true);
  formdata.append("id", id);
  $.ajax({
    url: base_url + "App/Request",
    type: 'POST',
    data:formdata,
    processData: false,
    contentType: false,
    success: function(response){
      $( "#alert" ).empty().append( response );
      LoadMain('table', type);
  }
  });
}


function generateProjectPDF(id){

  var form = document.createElement("form");
  var input = document.createElement("input"); 
  form.method = "POST";
  form.action = base_url + "App/generateProjectPDF";   
  form.target = "_blank";
  input.value=id;
  input.name="id";
  form.appendChild(input);  
  document.body.appendChild(form);
  form.submit();

}

