<div id="respondBox" class="lightbox">
  <div id="box">
    <h2>Respond to HSE Card</h2>

    <form id="responseForm">
      <div class="form">
        <div id="cardID" class="dontShow"></div>

        <div class="mainFormField">
          <h3>Improvement category</h3>
          <select name="improvementCategory" required>
            <option value="">--</option>
            <option>Positive safety observation</option>
            <option>Non-compliance</option>
            <option>Unsafe condition</option>
            <option>Unsafe act</option>
            <option>Near miss</option>
            <option>Hazardous situation</option>
            <option>Accident</option>
            <option>HSE idea</option>
          </select>
        </div>

        <div class="mainFormField">
          <h3>Recommended actions</h3>
          <textarea name="recommendedActions" required></textarea>
        </div>

        <div class="mainFormField">
          <h3>Potential risk severity code</h3>
          <select name="severity" required>
            <option value="">--</option>
            <option>High</option>
            <option>Medium</option>
            <option>Low</option>
          </select>
        </div>

        <div class="mainFormField">
          <h3>Comment</h3>
          <textarea name="comment" required></textarea>
        </div>
      </div>

      <div class="aCenter">
        <button onclick="updateCVStatus()">Post response</button>
      </div>
    </form>
  </div>
  <div class="back" onclick="toggleBox('respondBox')"></div>
</div>