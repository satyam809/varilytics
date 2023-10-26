@include('user.header')
        <div class="page-title section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="page_title-content">
                            <h3>Search</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="prevention section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Search Box -->
                        <div class="card-box-border">
                            <div class="d-flex">
                                <div class="col">
                                    <label>What are you looking for?</label>
                                    <input type="text" name="" placeholder="keyword" class="form-control">
                                </div>
                                <div class="col">
                                    <label>What kind of dataset you need?</label>
                                    <select class="form-control">
                                        <option value="Reports">Reports</option>
                                        <option value="Whitepaper">Whitepapers</option>
                                        <option value="Publication">Publication</option>
                                        <option value="Outlook">Outlook</option>
                                        <option value="Surveys">Surveys</option>
                                        <option value="Statistics">Statistics</option>
                                        <option value="Newsfeed">Newsfeed</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label>In which format you need?</label>
                                    <select class="form-control">
                                        <option value="PDF">PDF</option>
                                        <option value="EXCEL">EXCEL</option>
                                        <option value="CSV">CSV</option>
                                    </select>
                                </div>
                                <button type="submit" id="main-query-submit" class="submit_btn mr-2 mt-4">Go</button>
                            </div>
                            <hr>
                            <label class="col-md-12 mb-2"><b>Advance filters:</b> <br>
                                <small>Use filters to refine the search results.</small></label>
                            <div class="col">
                                <div class="row advance-filters">
                                    <div class="col">
                                        <label><small>Country:</small></label>
                                        <select class="js-select2">
                                            <option>Argentina</option>
                                            <option>Australia</option>
                                            <option>Brazil</option>
                                            <option>Canada</option>
                                            <option>China</option>
                                            <option>Egypt</option>
                                            <option>European Union</option>
                                            <option>India</option>
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
                                        <select class="js-select2 multiple_select2" multiple="multiple">
                                            <option>Animal Stroke</option>
                                            <option>Commodity</option>
                                            <option>GDP</option>
                                            <option>Labour</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label><small>Commodity:</small></label>
                                        <select class="js-select2 multiple_select2" multiple="multiple">
                                            <option>Maize</option>
                                            <option>Rice</option>
                                            <option>Soyabean</option>
                                            <option>Wheat</option>
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
                                        <select class="js-select2 multiple_select2" multiple="multiple">
                                            <option>Area Harvested</option>
                                            <option>Crush</option>
                                            <option>Closing Stocks</option>
                                            <option>Domestic Utilization</option>
                                            <option>Exports(ITY)</option>
                                            <option>Exports(NMY)</option>
                                            <option>Extraction Rate</option>
                                            <option>Food Use</option>
                                            <option>Food/Seed/Industrial Use</option>
                                            <option>Feed Dom. Consumption</option>
                                            <option>Feed Waste Dom. Cons.</option>
                                            <option>Imports(ITY)</option>
                                            <option>Import(NMY)</option>
                                            <option>Opening Stocks</option>
                                            <option>Production</option>
                                            <option>Production Paddy</option>
                                            <option>Total Supply</option>
                                            <option>Total Utilization</option>
                                            <option>Yield</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label><small>Season:</small></label>
                                        <select class="js-select2 multiple_select2" multiple="multiple">
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
                            <div class="col-md-12 AddingDiv mt-3 p-0" style="display:none">
                                <div class="d-flex">
                                    <div class="col">
                                        <select class="form-control">
                                            <option value="title">Title </option>
                                            <option value="author">Author (Publication)</option>
                                            <option value="subject">Keyword (Publication)</option>
                                            <option value="dateIssued">Date of Published /Complete</option>
                                            <option value="pubdivisionUnit">Division (Publication)</option>
                                            <option value="didivisionUnit">Division (Data Inventory)</option>
                                            <option value="disubject">Subject (Data Inventory)</option>
                                            <option value="dicopiname">CoPI Name (Data Inventory)</option>
                                            <option value="dipiname">PI Name (Data Inventory)</option>
                                            <option value="pubType">Content Types (Publication)</option>
                                            <option value="languageIso">Languages</option>
                                            <option value="dipiemail">PI Email (Data Inventory)</option>
                                            <option value="dicopiemail">CoPI Email (Data Inventory)</option>
                                            <option value="dikeywords">Keywords (Data Inventory)</option>
                                            <option value="pubauthaffiliation">Author's Affiliation (Publication)</option>
                                            <option value="pubjournalnm">Journal Name (Publication)</option>
                                            <option value="pubpublishnm">Publisher Name (Publication)</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select class="form-control">
                                            <option value="equals">Equals</option>
                                            <option value="contains">Contains</option>
                                            <option value="authority">ID</option>
                                            <option value="notequals">Not Equals</option>
                                            <option value="notcontains">Not Contains</option>
                                            <option value="notauthority">Not ID</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <input type="text" size="45" required class="form-control" autocomplete="off">
                                    </div>
                                    <button type="submit" id="RemoveDiv" class="submit_btn mt-0">Remove</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-box">
                            <h5>Item Hits:</h5>
                            <table class="table table-hover responsive dataTable stripe" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Published/ Complete Date</th>
                                        <th>Title</th>
                                        <th>Author(s)/ PI/CoPI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="odd">
                                        <td>1-Aug-2007</td>
                                        <td><a href="#">Annual Report 2006-2007</a></td>
                                        <td><a href="#">Director, ICAR-CIBA</a></td>
                                    </tr>
                                    <tr class="even">
                                        <td>1-Jul-2010</td>
                                        <td><a href="#">ICAR NRCB Annual Report 2009 - 2010</a></td>
                                        <td><a href="#">ICAR - NRCB Director</a></td>
                                    </tr>
                                    <tr class="odd">
                                        <td>Jul-2005</td>
                                        <td><a href="#">WEEDS THAT HEAL</a></td>
                                        <td><a href="#">V.S.G.R. Naidu; N.T. Yaduraju; A.K. Gogoi</a></td>
                                    </tr>
                                    <tr class="odd">
                                        <td>1-Aug-2007</td>
                                        <td><a href="#">Annual Report 2006-2007</a></td>
                                        <td><a href="#">Director, ICAR-CIBA</a></td>
                                    </tr>
                                    <tr class="even">
                                        <td>1-Jul-2010</td>
                                        <td><a href="#">ICAR NRCB Annual Report 2009 - 2010</a></td>
                                        <td><a href="#">ICAR - NRCB Director</a></td>
                                    </tr>
                                    <tr class="odd">
                                        <td>Jul-2005</td>
                                        <td><a href="#">WEEDS THAT HEAL</a></td>
                                        <td><a href="#">V.S.G.R. Naidu; N.T. Yaduraju; A.K. Gogoi</a></td>
                                    </tr>
                                    <tr class="odd">
                                        <td>1-Aug-2007</td>
                                        <td><a href="#">Annual Report 2006-2007</a></td>
                                        <td><a href="#">Director, ICAR-CIBA</a></td>
                                    </tr>
                                    <tr class="even">
                                        <td>1-Jul-2010</td>
                                        <td><a href="#">ICAR NRCB Annual Report 2009 - 2010</a></td>
                                        <td><a href="#">ICAR - NRCB Director</a></td>
                                    </tr>
                                    <tr class="odd">
                                        <td>Jul-2005</td>
                                        <td><a href="#">WEEDS THAT HEAL</a></td>
                                        <td><a href="#">V.S.G.R. Naidu; N.T. Yaduraju; A.K. Gogoi</a></td>
                                    </tr>
                                    <tr class="odd">
                                        <td>1-Aug-2007</td>
                                        <td><a href="#">Annual Report 2006-2007</a></td>
                                        <td><a href="#">Director, ICAR-CIBA</a></td>
                                    </tr>
                                    <tr class="even">
                                        <td>1-Jul-2010</td>
                                        <td><a href="#">ICAR NRCB Annual Report 2009 - 2010</a></td>
                                        <td><a href="#">ICAR - NRCB Director</a></td>
                                    </tr>
                                    <tr class="odd">
                                        <td>Jul-2005</td>
                                        <td><a href="#">WEEDS THAT HEAL</a></td>
                                        <td><a href="#">V.S.G.R. Naidu; N.T. Yaduraju; A.K. Gogoi</a></td>
                                    </tr>
                                    <tr class="odd">
                                        <td>1-Aug-2007</td>
                                        <td><a href="#">Annual Report 2006-2007</a></td>
                                        <td><a href="#">Director, ICAR-CIBA</a></td>
                                    </tr>
                                    <tr class="even">
                                        <td>1-Jul-2010</td>
                                        <td><a href="#">ICAR NRCB Annual Report 2009 - 2010</a></td>
                                        <td><a href="#">ICAR - NRCB Director</a></td>
                                    </tr>
                                    <tr class="odd">
                                        <td>Jul-2005</td>
                                        <td><a href="#">WEEDS THAT HEAL</a></td>
                                        <td><a href="#">V.S.G.R. Naidu; N.T. Yaduraju; A.K. Gogoi</a></td>
                                    </tr>
                                </tbody>
                            </table>
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
                                    <div class="cta-call">
                                        <span><i class="mdi mdi-phone"></i></span>
                                        (+91) 98 1234 5678
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="300">
                                    <div class="cta-call">
                                        <span><i class="mdi mdi-web"></i></span>
                                        <a href="mailto:support@varistats.com">
                                            support@varistats.com
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="footer">
            <div class="container">
                <!--  <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="copyright">
                            <p>© All Copyrights Reserved by <a href="javascript:void(0)">Varistats</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="footer-social">
                            <ul>
                                <li><a href="javascript:void(0)"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li><a href="javascript:void(0)"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li><a href="javascript:void(0)"><i class="fa fa-linkedin"></i></a>
                                </li>
                                <li><a href="javascript:void(0)"><i class="fa fa-youtube"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> -->
                <div class="col text-center">
                    <div class="footer-links">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><a href="data-bulletin.html">Platform</a></li>
                            <li><a href="#">Products</a></li>
                            <li><a href="#">Company</a></li>
                            <li><a href="#">Privacy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/global.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/owl-carousel-init.js"></script>
    <script src="assets/js/datatables.min.js"></script>
    <script src="assets/js/aos.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script>
        $(".js-select2").select2({
            closeOnSelect: false,
            placeholder: "Select",
            // allowHtml: true,
            allowClear: true,
            tags: true // создает новые опции на лету
        });
    </script>
    <script type="text/javascript">
        if (window.matchMedia('(max-width: 980px)').matches) {
            $('.dropdown').click(function() {
                $(this).children('.dropdown-menu').toggle();
                $('.dropdown').not(this).children('.dropdown-menu').hide();
            });
        }
    </script>
    <script type="text/javascript">
        /*
      Define the adapter so that it's reusable
*/
        $.fn.select2.amd.define('select2/selectAllAdapter', [
            'select2/utils',
            'select2/dropdown',
            'select2/dropdown/attachBody'
        ], function(Utils, Dropdown, AttachBody) {

            function SelectAll() {}
            SelectAll.prototype.render = function(decorated) {
                var self = this,
                    $rendered = decorated.call(this),
                    $selectAll = $(
                        '<label class="selectall"><input type="radio" name="select"> Select All</label>'
                    ),
                    $unselectAll = $(
                        '<label class="unselectall"><input type="radio" name="select"> Unselect All</label>'
                    ),
                    $btnContainer = $('<div style="margin:10px 0;text-align:center">').append($selectAll).append($unselectAll);
                if (!this.$element.prop("multiple")) {
                    // this isn't a multi-select -> don't add the buttons!
                    return $rendered;
                }
                $rendered.find('.select2-dropdown').prepend($btnContainer);
                $selectAll.on('click', function(e) {
                    var $results = $rendered.find('.select2-results__option[aria-selected=false]');
                    $results.each(function() {
                        self.trigger('select', {
                            data: $(this).data('data')
                        });
                    });
                    self.trigger('close');
                });
                $unselectAll.on('click', function(e) {
                    var $results = $rendered.find('.select2-results__option[aria-selected=true]');
                    $results.each(function() {
                        self.trigger('unselect', {
                            data: $(this).data('data')
                        });
                    });
                    self.trigger('close');
                });
                return $rendered;
            };

            return Utils.Decorate(
                Utils.Decorate(
                    Dropdown,
                    AttachBody
                ),
                SelectAll
            );

        });

        $('.multiple_select2').select2({
            placeholder: 'Select',
            dropdownAdapter: $.fn.select2.amd.require('select2/selectAllAdapter')
        });
    </script>
    <script type="text/javascript">
        //Icon Change Collapse
        $(".rigPanelBox h2 .fa-plus").click(function() {
            $(this).toggleClass("fa-minus");
        });
    </script>
    <script type="text/javascript">
        $("#addDiv").click(function() {
            $(".AddingDiv").show();
        });

        $("#RemoveDiv").click(function() {
            $(".AddingDiv").hide();
        });
    </script>
</body>

</html>