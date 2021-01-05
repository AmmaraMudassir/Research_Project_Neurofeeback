<!-- 
  This Function Renders the sidebar. Include it in which ever file side menu is required. It takes in 3 arguments (string Values):
  1. which tells which page is active: (PreBehavioral,Baseline,Testing,PostBehavioral)
  2. Name
  3. Registration ID

  IMPORTANT!! : Bootstrap CSS file must be included in header where this function is called
 -->

<?php

function renderSideMenu($active = 'Baseline',  $name = 'Hello World',  $id = '11000')
{
  echo ('
  <div class="col-2 side-menu shadow px-0 d-flex flex-column justify-content-around">
    <h2 class="text-capitalize text-center mx-auto mt-3 mb-3">neuro feedback</h2>
    <h5 class="m-3 ">Welcome ' . ($name) . '</h5>
    <h5 class="mx-3 mb-3 shadow-sm rounded px-2 py-3 text-center">Registration ID: <span class="text-warning font-weight-bold">' . ($id) . '</span></h5>

    <div class="list-group list-group-flush border-top mt-3">

      <a href="./preBehavioralTests.php" class="' . ($active == 'PreBehavioral' ? ' text-warning ' : '') . '  py-3 list-group-item list-group-item-action ">
        Pre-Behavioural Tests
      </a>
      <a href="./prebaseline.php" class="' . ($active == 'Baseline' ? ' text-warning ' : '') . '  py-3 list-group-item list-group-item-action ">Pre-Baseline Calculation</a>
      <a href="./testing.php" class="' . ($active == 'Testing' ? ' text-warning ' : '') . '  py-3 list-group-item list-group-item-action ">Testing</a>
      <a href="./postBaseline.php" class="' . ($active == 'PostBaseline' ? ' text-warning ' : '') . '  py-3 list-group-item list-group-item-action ">Post-Baseline Calculation</a>
      <a href="./postBehavioralTests.php" class="' . ($active == 'PostBehavioral' ? ' text-warning ' : '') . '  py-3 list-group-item list-group-item-action ">Post-Behavioural Tests</a>
      <a href="./reportselection.php" class="' . ($active == 'Report' ? ' text-warning ' : '') . '  py-3 list-group-item list-group-item-action ">Report</a>

    </div>
    </br>
    <button type="submit" class="btn btn-dark d-block mx-auto  "><a href="logout.php">LogOut</a></button>
  </div>
  <style>
    .side-menu {
      min-height: 100vh;
    }
  </style>');
}
