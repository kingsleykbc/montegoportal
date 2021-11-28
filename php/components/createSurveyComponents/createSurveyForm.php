<form action="index.php" class="createSurveyForm whiteBoard" name="createSurveyForm" onsubmit="addSurvey()">

  <label class="mainFormField">
    <h3>Survey title</h3>
    <input type="text" name="title" id="title" placeholder="Title of the survey" required />
  </label>

  <label class="mainFormField">
    <h3>Description </h3>
    <textarea id="description" placeholder="Brief description of the survey" required></textarea>
  </label>

  <h3 class="sec">Survey Categories</h3>
  <div class="categories">
    <div id="categoriesFields"></div>
    <div class="button max" onclick="addCategoryField()"> Add </div>
  </div>

  <br>

  <div class="aCenter"> <button>Next</button> </div>
</form>