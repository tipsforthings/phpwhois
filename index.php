<?php


include('inc/header.php');

?>
    <div class="row">
      <div class="large-2 medium-2 columns no-padding">
        <div style="width: 100%; height: 1px; background: #000;" class="show-for-medium">
        </div>
      </div>
      <div class="large-8 medium-8 columns no-padding">
        <div style="width: 100%; height: 1px; background: #000; " class="show-for-medium">
        </div>
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- DNS Tools (Left Sidebar) -->
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="ca-pub-1349721370570124"
             data-ad-slot="1763130906"
             data-ad-format="auto"></ins>
        <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
            <h1 id="page-title">DINSLY Tools</h1>
            <p class="text-center">A selection of domain tools including Whois, NS Lookup, DIG and IP Locate.</p>
            <br />
        <div class="row">
          <div class="small-6 medium-3 columns">
            <h5>NS Lookup</h5>
          </div>
          <div class="small-6 medium-3 columns">
            <h5>Dig</h5>
          </div>
          <div class="small-6 medium-3 columns">
            <h5>Whois</h5>
          </div>
          <div class="small-6 medium-3 columns">
            <h5>IP Locate</h5>
          </div>
        </div>
        <div class="row">
          <div class="large-12 columns no-padding">
            <form>
              <fieldset class="fieldset">
                <legend>Enter any Domain Name, IP address or AS handle you would like to query Whois for.</legend>
                <div class="row">
                  <div class="large-6 columns">
                    <div class="input-group">
                      <input class="input-group-field" name="query" id="query-input" type="text">
                      <div class="input-group-button">
                        <input type="submit" id="submit-button" class="button" value="Whois">
                      </div>
                    </div>
                      <label class="error" for="host" id="query-error">This field is required.</label>
                    <input type="checkbox" id="fast-lookup" name="fast" /> Fast lookup
                  </div>
                  <div class="large-6 columns">
                    <label>
                      <select name="output" id="display-type" aria-describedby="outputTypeHelp">
                        <option value="normal">Normal</option>
                        <option value="nice" selected="selected">HTMLized</option>
                        <option value="object">PHP Object</option>
                      </select>
                      <p class="help-text" id="outputTypeHelp">Please select the output type of your request.</p>
                    </label>
                  </div>
                </div>
              </fieldset>
            </form>
          </div>
        </div>
        <div class="row">
          <div class="large-12 columns no-padding">
            <div id="query-results">
            </div>
          </div>
        </div>    
      </div>
      <div class="large-2 medium-2 columns no-padding">
        <div style="width: 100%; height: 1px; background: #000;" class="show-for-medium">
        </div>
      </div>
    </div>

<?php


include('inc/footer.php');

?>