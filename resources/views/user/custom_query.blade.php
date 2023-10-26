<div class="page-title section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="page_title-content">
                    <h3>Query</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="prevention section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="rigPanelBox">
                    <h2 class="mb-0"><i class="fa fa-search"></i> Search </h2>
                    <div class="table-padding multiselect2">
                        <div class="row">
                            <div class="col">
                                <label>Data Source:</label>
                                <div class="customCheckbox">
                                    <div class="customCheckbox-primary ng-star-inserted">
                                        <input checked="" type="checkbox" id="VariStats" class="ng-untouched ng-pristine ng-valid">
                                        <label for="Varilytics"> <img alt="Varilytics logo" src="assets/images/vari-logo-pic.png"> <span>Varilytics</span> </label>
                                    </div>
                                    <div class="customCheckbox-primary ng-star-inserted">
                                        <input checked="" type="checkbox" id="Fao" class="ng-untouched ng-pristine ng-valid">
                                        <label for="Fao"> <img alt="Fao logo" src="assets/images/igc-logo.png"> <span>FAO</span> </label>
                                    </div>
                                    <div class="customCheckbox-primary ng-star-inserted">
                                        <input checked="" type="checkbox" id="ICAR" class="ng-untouched ng-pristine ng-valid">
                                        <label for="ICAR"> <img alt="ICAR logo" src="assets/images/icarlogo.png"> <span>ICAR</span> </label>
                                    </div>
                                    <!-- <div class="customCheckbox-primary ng-star-inserted">
                                <input checked="" type="checkbox" id="Agricoop" class="ng-untouched ng-pristine ng-valid">
                                <label for="Agricoop">
                                  <img alt="Agricoop logo" src="images/agricoop-logo.png">
                                  <span>Agricoop</span>
                                </label>
                            </div> -->
                                    <div class="customCheckbox-primary ng-star-inserted">
                                        <input checked="" type="checkbox" id="NSSO" class="ng-untouched ng-pristine ng-valid">
                                        <label for="NSSO"> <img alt="NSSO logo" src="assets/images/nsso.jpg"> <span>NSSO</span> </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>Upload the Dataset:</label>
                                <input type="file" name="" class="form-control" style="padding:7px;">
                                <small class="downloadexcel">Download: <a href="images/Orders-With Nulls.xlsx" download=""><i class="fa fa-file-excel-o"></i> Format.xls</small></a>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col">
                                <label><small>Country:</small></label>
                                <select class="js-select2">
                                    <option>India</option>
                                    <option>Australia</option>
                                    <option>Brazil</option>
                                    <option>Canada</option>
                                    <option>China</option>
                                    <option>Egypt</option>
                                    <option>European Union</option>
                                    <option>Argentina</option>
                                </select>
                            </div>
                            <div class="col">
                                <label><small>States:</small></label>
                                <select class="js-select2">
                                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                                    <option value="Andaman and Nicobar Islands">Andaman & Nicobar</option>
                                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                    <option value="Assam">Assam</option>
                                    <option value="Bihar">Bihar</option>
                                    <option value="Chandigarh">Chandigarh</option>
                                    <option value="Chhattisgarh">Chhattisgarh</option>
                                    <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                    <option value="Daman and Diu">Daman and Diu</option>
                                    <option value="Delhi">Delhi</option>
                                    <option value="Lakshadweep">Lakshadweep</option>
                                    <option value="Puducherry">Puducherry</option>
                                    <option value="Goa">Goa</option>
                                    <option value="Gujarat">Gujarat</option>
                                    <option value="Haryana">Haryana</option>
                                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                                    <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                    <option value="Jharkhand">Jharkhand</option>
                                    <option value="Karnataka">Karnataka</option>
                                    <option value="Kerala">Kerala</option>
                                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                                    <option value="Maharashtra">Maharashtra</option>
                                    <option value="Manipur">Manipur</option>
                                    <option value="Meghalaya">Meghalaya</option>
                                    <option value="Mizoram">Mizoram</option>
                                    <option value="Nagaland">Nagaland</option>
                                    <option value="Odisha">Odisha</option>
                                    <option value="Punjab">Punjab</option>
                                    <option value="Rajasthan">Rajasthan</option>
                                    <option value="Sikkim">Sikkim</option>
                                    <option value="Tamil Nadu">Tamil Nadu</option>
                                    <option value="Telangana">Telangana</option>
                                    <option value="Tripura">Tripura</option>
                                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                                    <option value="Uttarakhand">Uttarakhand</option>
                                    <option value="West Bengal">West Bengal</option>
                                </select>
                            </div>
                            <div class="col">
                                <label><small>Category:</small></label>
                                <select class="js-select2">
                                    <option>Commodity</option>
                                    <option>GDP</option>
                                    <option>Animal Stroke</option>
                                    <option>Labour</option>
                                </select>
                            </div>
                            <div class="col">
                                <label><small>Commodity:</small></label>
                                <select class="js-select2" multiple="multiple">
                                    <option>Maize</option>
                                    <option>Wheat</option>
                                    <option>Rice</option>
                                    <option>Soyabean</option>
                                </select>
                            </div>
                            <div class="col">
                                <label><small>Time:</small></label>
                                <select class="js-select2">
                                    <option>Last 1 year</option>
                                    <option>Last 2 year</option>
                                    <option>Last 5 year</option>
                                </select>
                            </div>
                            <div class="col">
                                <label><small>Element:</small></label>
                                <select class="js-select2" multiple="multiple">
                                    <option>Total Supply</option>
                                    <option>Opening Stocks</option>
                                    <option>Production</option>
                                    <option>Area Harvested</option>
                                    <option>Yield</option>
                                    <option>Imports(ITY)</option>
                                    <option>Import(NMY)</option>
                                    <option>Total Utilization</option>
                                    <option>Domestic Utilization</option>
                                    <option>Crush</option>
                                    <option>Food Use</option>
                                    <option>Food/Seed/Industrial Use</option>
                                    <option>Feed Dom. Consumption</option>
                                    <option>Feed Waste Dom. Cons.</option>
                                    <option>Exports(ITY)</option>
                                    <option>Exports(NMY)</option>
                                    <option>Closing Stocks</option>
                                    <option>Production Paddy</option>
                                    <option>Extraction Rate</option>
                                </select>
                            </div>
                            <div class="col">
                                <label><small>Season:</small></label>
                                <select class="js-select2" multiple="multiple">
                                    <option>2001/02</option>
                                    <option>2002/03</option>
                                    <option>2003/04</option>
                                    <option>2004/05</option>
                                    <option>2005/06</option>
                                    <option>2006/07</option>
                                    <option>2007/08</option>
                                    <option>2009/10</option>
                                    <option>20010/11</option>
                                    <option>20011/12</option>
                                    <option>20012/13</option>
                                    <option>20013/14</option>
                                    <option>20014/15</option>
                                    <option>20015/16</option>
                                    <option>20016/17</option>
                                    <option>20017/18</option>
                                    <option>20018/19</option>
                                    <option>20019/20</option>
                                    <option>20020/21</option>
                                </select>
                            </div>
                            <div class="col text-right">
                                <button type="submit" class="submit_btn" style="height:40px;line-height: normal;">Run Query</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="rigPanelBox">
                    <h2 class="mb-0"><i class="fa fa-table"></i> Result <i class="fa fa-arrows-alt btn-fullscreen" aria-hidden="true"></i> <i class="fa fa-print printIconArea" aria-hidden="true" style="right: 35px;"></i> <i class="fa fa-download DownloadIconArea" aria-hidden="true" style="right: 65px;"></i> </h2>
                    <div class="table-padding">
                        <table class="table table-hover responsive dataTable stripe" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Source</th>
                                    <th>Country/Region</th>
                                    <th>Commodity</th>
                                    <th>Element</th>
                                    <th>Season</th>
                                    <th>Value</th>
                                    <th>Element Unit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="odd">
                                    <td>FAO-AMIS</td>
                                    <td>World</td>
                                    <td>Maize</td>
                                    <td>Production</td>
                                    <td>2018/19</td>
                                    <td>1,116.59</td>
                                    <td>Million tonnes</td>
                                </tr>
                                <tr class="even">
                                    <td>FAO-AMIS</td>
                                    <td>World</td>
                                    <td>Wheat</td>
                                    <td>Production</td>
                                    <td>2018/19</td>
                                    <td>731.41</td>
                                    <td>Million tonnes</td>
                                </tr>
                                <tr class="odd">
                                    <td>FAO-AMIS</td>
                                    <td>World</td>
                                    <td>Rice</td>
                                    <td>Production</td>
                                    <td>2018/19</td>
                                    <td>508.20</td>
                                    <td>Million tonnes</td>
                                </tr>
                                <tr class="odd">
                                    <td>FAO-AMIS</td>
                                    <td>World</td>
                                    <td>Soybean</td>
                                    <td>Production</td>
                                    <td>2018/19</td>
                                    <td>364.59</td>
                                    <td>Million tonnes</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="rigPanelBox">
                    <h2 class="mb-0"><i class="fa fa-info-circle"></i> Notes: <i class="fa fa-arrows-alt btn-fullscreen" aria-hidden="true"></i> <i class="fa fa-plus printIconArea" data-toggle="collapse" href="#collapse1" role="button" style="right: 35px;"></i> <i class="fa fa-download DownloadIconArea" aria-hidden="true" style="right: 65px;"></i> </h2>
                    <div class="table-padding collapse" id="collapse1">
                        <table class="table table-hover responsive dataTable stripe" style="width:100%">
                            <tbody>
                                <tr class="odd">
                                    <td> Marketing year (or marketing season) </td>
                                    <td> Commodity balances apply a marketing year (or marketing season) approach, meaning that values refer to a twelve month period that starts with the harvest of the main crop (which may or may not coincide with the calendar year).</td>
                                </tr>
                                <tr class="even">
                                    <td> Production, Maize </td>
                                    <td> Maize production data for FAO-AMIS refer to crops harvested during the first year of the marketing season (e.g. 2018 for the 2018/19 marketing season) in both the northern and southern hemisphere. Maize data for IGC and USDA-PSD encompass production in the northern hemisphere occurring during the first year of the season (e.g. 2018 for the 2018/19 marketing season), as well as crops harvested in the southern hemisphere during the second year of the season (e.g. 2019 for the 2018/19 marketing season).</td>
                                </tr>
                                <tr class="odd">
                                    <td> Production, Rice </td>
                                    <td> Rice data for IGC and USDA-PSD encompass production in the northern hemisphere occurring during the first year of the season (e.g. 2018 for the 2018/19 marketing season), as well as crops harvested in the southern hemisphere during the second year of the season (e.g. 2019 for the 2018/19 marketing season). Rice production data for FAO-AMIS refer to crops harvested during the first year of the marketing season (e.g. 2018 for the 2018/19 marketing season) in both the northern and southern hemisphere. It also includes northern hemisphere production from secondary crops harvested in the second year of the marketing season (e.g. 2019 for the 2018/19 marketing season).</td>
                                </tr>
                                <tr class="even">
                                    <td> Production, Wheat </td>
                                    <td> Wheat production data from all three sources (FAO-AMIS, IGC and USDA-PSD) refer to production occurring in the first year of the marketing season shown (e.g.crops harvested in 2018 are allocated to the 2018/19 marketing season).</td>
                                </tr>
                                <tr class="odd">
                                    <td> Production, Soybeans </td>
                                    <td> Soybeans production data from all three sources (FAO-AMIS, IGC and USDA-PSD) encompass production in the northern hemisphere occurring during the first year of the season (e.g. 2018 for the 2018/19 marketing season), as well as crops harvested in the southern hemisphere during the second year of the season (e.g. 2019 for the 2018/19 marketing season) .</td>
                                </tr>
                                <tr class="even">
                                    <td> NMY Argentina Wheat </td>
                                    <td> December N/November N+1 (FAO-AMIS, IGC and USDA-PSD)</td>
                                </tr>
                                <tr class="odd">
                                    <td> NMY Argentina Rice </td>
                                    <td> January N/December N (FAO-AMIS) and April N+1/March N+2 (IGC and USDA-PSD)</td>
                                </tr>
                                <tr class="even">
                                    <td> NMY Argentina Maize </td>
                                    <td> March N/February N+1 (FAO-AMIS) and March N+1/February N+2 (IGC and USDA-PSD)</td>
                                </tr>
                                <tr class="odd">
                                    <td> NMY Argentina Soybeans </td>
                                    <td> April N+1/March N+2 (FAO-AMIS and IGC) and October N/September N+1 (USDA-PSD)</td>
                                </tr>
                                <tr class="even">
                                    <td> Rice </td>
                                    <td> All values are presented on a milled equivalent basis, unless otherwise stated.</td>
                                </tr>
                                <!---->
                                <tr class="odd">
                                    <td>FAO-AMIS last update</td>
                                    <td>8 Jul 2021</td>
                                </tr>
                                <tr class="even">
                                    <td>USDA-PSD last update</td>
                                    <td>20 Jan 2021</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="rigPanelBox">
                    <h2 class="mb-0"><i class="fa fa-info-circle"></i> Definitions: <i class="fa fa-arrows-alt btn-fullscreen" aria-hidden="true"></i> <i class="fa fa-plus printIconArea" data-toggle="collapse" href="#collapse2" role="button" style="right: 35px;"></i> <i class="fa fa-download DownloadIconArea" aria-hidden="true" style="right: 65px;"></i> </h2>
                    <div class="table-padding collapse" id="collapse2">
                        <table class="table table-hover responsive dataTable stripe" style="width:100%">
                            <tbody>
                                <tr class="odd">
                                    <td> Production</td>
                                    <td> Production refers to the full amount of the harvest before any deductions are made for post-harvest losses, seed use, etc. Production of wheat, maize and soybeans is in terms of product weight. For rice, paddy is converted to milled equivalent.</td>
                                </tr>
                                <tr class="even">
                                    <td> Total cereals and coarse grains</td>
                                    <td> Total cereals include wheat, coarse grains (maize, barley, sorghum, oats, rye, millet and other minor grains not elsewhere specified) and rice (in milled equivalent).</td>
                                </tr>
                                <tr class="odd">
                                    <td> Maize</td>
                                    <td> Maize includes yellow and white maize.</td>
                                </tr>
                                <tr class="even">
                                    <td> Wheat</td>
                                    <td> Wheat includes soft and durum wheat</td>
                                </tr>
                                <tr class="odd">
                                    <td> USDA-PSD </td>
                                    <td> United States Department of Agriculture (USDA) Production, Supply and Distribution (PSD): https://apps.fas.usda.gov/psdonline/app/index.html</td>
                                </tr>
                                <tr class="even">
                                    <td> IGC </td>
                                    <td> International Grains Council (IGC): https://www.igc.int/</td>
                                </tr>
                                <tr class="odd">
                                    <td> FAO-AMIS</td>
                                    <td> Food and Agriculutre Organization of the United Nations (FAO) - Agricultural Market Information System (AMIS): www.amis-outlook.org</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <div class="cta section-padding pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="cta-content">
                            <h2>FOR MORE INFORMATION ON VARISTATS</h2>
                            <div class="row justify-content-center">
                                <div class="col-xl-4 col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="100">
                                    <div class="cta-call"> <span><i class="mdi mdi-phone"></i></span> (+91) 98 1234 5678 </div>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="300">
                                    <div class="cta-call"> <span><i class="mdi mdi-web"></i></span> <a href="mailto:support@varistats.com">
                                            support@varistats.com
                                        </a> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->