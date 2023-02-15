{*
* 2007-2023 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author    PrestaShop SA <contact@prestashop.com>
*  @copyright 2007-2023 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

<head>
<link href="https://ui-kit.prestashop.com/backoffice/latest/css/bootstrap-prestashop-ui-kit.css" rel="stylesheet">
<script src="https://ui-kit.prestashop.com/backoffice/latest/js/prestashop-ui-kit.js"></script>
</head>

{if isset($success)}
<div class="alert alert-success" role="alert">
  <p class="alert-text">{$success}</p>
</div>
{/if}

<ul class="nav nav-pills" role="tablist">
  <li class="nav-item">
    <a
      class="nav-link active"
      id="pills-home-tab"
      data-toggle="pill"
      href="#pills-home"
      role="tab"
      aria-controls="pills-home"
      aria-expanded="true"
      >Dashboard</a
    >
  </li>
  <li class="nav-item">
    <a
      class="nav-link"
      id="pills-profile-tab"
      data-toggle="pill"
      href="#pills-profile"
      role="tab"
      aria-controls="pills-profile"
      aria-expanded="true"
      >Tutorial</a
    >
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">
  <div
    class="tab-pane fade show active"
    id="pills-home"
    role="tabpanel"
    aria-labelledby="pills-home-tab"
  >
    <div class="container">

		<form id="add-card-form" method="POST">
			<div class="form-group">
				<label for="card-number">Card Number</label>
				<input type="text" id="card-number" name="card-number" required>
			</div>
			
			<button type="submit" class="btn btn-primary btn-lg">Submit</button>
		</form>

    </div>
  </div>
  <div
    class="tab-pane fade"
    id="pills-profile"
    role="tabpanel"
    aria-labelledby="pills-profile-tab"
  >
    <div class="container">
      <h2>Guideline for Redirect URL Module in Prestashop</h2>
      <ul>
        <li>To apply a redirect, enter the URL in the <b>Mapping URL Field</b>.</li><br>
        <li>The URL you want to redirect should be entered in <b>Redirect URL Field</b>.</li>
        <img src="{__PS_BASE_URI__}/modules/aroredirectmodule/views/img/ps_redirect_module.png" alt="prestashop redirect module" width="90%" height="50%">
        <li>Now, when you visit the mapping url that you configured, you will be sent to the navigation url.</li>
      <ul>
    </div>
  </div>
</div>

<style>
  #add-card-form {
    width: 400px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid gray;
    box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
  }
  
  .form-group {
    margin-bottom: 20px;
  }
  
  label {
    font-weight: bold;
    display: block;
    margin-bottom: 10px;
  }
  
</style>
