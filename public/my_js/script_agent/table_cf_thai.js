function txt_cf_thia(value, level) {
    var num_3upper = JSON.parse(value.num_3upper); //(3 ตัวบน)
    var num_3under = JSON.parse(value.num_3under); //(3 ตัวล่าง)
    var num_3toad = JSON.parse(value.num_3toad); //(3 ตัวโต๊ด) 
    var num_2upper = JSON.parse(value.num_2upper); //(2 ตัวบน)
    var num_2under = JSON.parse(value.num_2under); //(2 ตัวล่าง)
    var num_2toad = JSON.parse(value.num_2toad); //(2 ตัวโต๊ด)
    var num_1upper = JSON.parse(value.num_1upper); //(1 ตัวบน)
    var num_1under = JSON.parse(value.num_1under); //(1 ตัวล่าง)
    var num_hundreds = JSON.parse(value.num_hundreds); //(ปักหลักร้อย)
    var num_tens = JSON.parse(value.num_tens); //(ปักหลักสิบ)
    var num_ones = JSON.parse(value.num_ones); //(ปักหลักหน่วย)
    var num_4upper = JSON.parse(value.num_4upper); //(4 ตัวบน)
    var num_4toad = JSON.parse(value.num_4toad); //(4 ตัวโต๊ด)
    var num_5toad = JSON.parse(value.num_5toad); //(5 ตัวโต๊ด)
    var status_line = JSON.parse(value.status_line).status_line;
    var txt = `
    <div class="tab-pane active" id="` +
        value.tb_cf +
        `" role="tabpanel">
       <table id="" class="table table-bordered table-hover">
          <thead>
             <tr class="header2">
                <th rowspan="2">ประเภท</th>
                <th rowspan="2">ขั้นต่ำต่อไม้</th>
                <th rowspan="2">สูงสุดต่อไม้</th>
                <th rowspan="2">ต่อหมายเลข</th>
                <th colspan="3">คอมมิชชั่น / อัตราจ่าย</th>
                <th colspan="3">เปอร์เซ็นถือสู้&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="copyShare1" id="copyShare1" value="1" onclick="copyAllShare(1,this)">
                   <font color="#FC3">คัดลอกหุ้น</font>
                </th>
             </tr>
             <tr class="header2">`;
    txt += `<th>`;
    if (status_line.A == 1) {
        txt += `<span id="captionA1" style="display: inline;">
               <input type="checkbox" name="lineA1" id="lineA1" onclick="SelectLine(1,'A',(this.checked?1:0));" checked="">&nbsp;LINE A
               </span>`;
    }
    txt += `</th>`;
    txt += `<th>`;
    if (status_line.B == 1) {
        txt += `
               <span id="captionB1" style="display: inline;">
               <input type="checkbox" name="lineB1" id="lineB1" onclick="SelectLine(1,'B',(this.checked?1:0));" checked="">&nbsp;LINE B
               </span>`;
    }
    txt += `</th>`;
    txt += `<th>`;
    if (status_line.C == 1) {
        txt += `<span id="captionC1" style="display: inline;">
               <input type="checkbox" name="lineC1" id="lineC1" onclick="SelectLine(1,'C',(this.checked?1:0));" checked="">&nbsp;LINE C
               </span>`;
    }
    txt += `</th>`;
    switch (level) {
        case "1":
            txt += `
                <th><span id="captionUpper1">% โปร</span></th>
                <th><span id="captionTarget1">% เว็บ</span></th>
                <th><span id="captionTake1">ถือสู้ส่วนที่เหลือ</span></th>
                `;
            break;
        case "2":
            txt += `
                <th><span id="captionUpper1">% เว็บ</span></th>
                <th><span id="captionTarget1">% ซุปเปอร์</span></th>
                <th><span id="captionTake1">ถือสู้ส่วนที่เหลือ</span></th>
                `;
            break;
        case "3":
            txt += `
                <th><span id="captionUpper1">% ซุปเปอร์ </span></th>
                <th><span id="captionTarget1">% ซีเนียร์ </span></th>
                <th><span id="captionTake1">ถือสู้ส่วนที่เหลือ</span></th>
                `;
            break;
        case "4":
            txt += `
                <th><span id="captionUpper1">% ซีเนียร์</span></th>
                <th><span id="captionTarget1">% มาสเตอร์ </span></th>
                <th><span id="captionTake1">ถือสู้ส่วนที่เหลือ</span></th>
                `;
            break;
        case "5":
            txt += `
                <th><span id="captionUpper1">% มาสเตอร์ </span></th>
                <th><span id="captionTarget1">% เอเย่นต์</span></th>
                <th><span id="captionTake1">ถือสู้ส่วนที่เหลือ</span></th>
                `;
            break;
        case "6":
            txt += `
                <th><span id="captionUpper1">% มาสเตอร์ </span></th>
                <th><span id="captionTarget1">% เอเย่นต์</span></th>
                <th><span id="captionTake1">ถือสู้ส่วนที่เหลือ</span></th>
                `;
            break;
        case "7":
            txt += `
                <th><span id="captionUpper1">% มาสเตอร์ </span></th>
                <th><span id="captionTarget1">% เอเย่นต์</span></th>
                <th><span id="captionTake1">ถือสู้ส่วนที่เหลือ</span></th>
                `;
            break;
        case "8":
            txt += `
                <th><span id="captionUpper1">% เอเย่นต์</span></th>
                <th><span id="captionTarget1"></span></th>
                <th><span id="captionTake1"></span></th>
                `;
            break;
    }

    txt += `</tr>
          </thead>
          <tbody>`;
    //  ============================= (3 ตัวบน) =============================
    txt += `<tr>
                <td>
                   <span class="text_sky">(3 ตัวบน)</span>
                </td>`;
    txt += td_(num_3upper, 'num_3upper', level, status_line);
    txt += ` </tr>`;
    // ========================== (3 ตัวล่าง) ==================================
    txt += `
            <tr>
               <td>
                  <span class="text_sky">(3 ตัวล่าง) </span>
               </td> `;
    txt += td_(num_3under, 'num_3under', level, status_line);
    txt += `</tr>`
        // =============================  (3 ตัวโต๊ด) ===================================
    txt += `
            <tr>
               <td>
                  <span class="text_sky"> (3 ตัวโต๊ด) </span>
               </td> `;
    txt += td_(num_3toad, 'num_3toad', level, status_line);
    txt += `</tr>`
        // =========================  (2 ตัวบน) ============================
    txt += `
            <tr>
               <td>
                  <span class="text_sky"> (2 ตัวบน) </span>
               </td> `;
    txt += td_(num_2upper, 'num_2upper', level, status_line);
    txt += `</tr>`
        // ============================ (2 ตัวล่าง) ===================
    txt += `
            <tr>
               <td>
                  <span class="text_sky"> (2 ตัวล่าง) </span>
               </td> `;
    txt += td_(num_2under, 'num_2under', level, status_line);
    txt += `</tr>`
        // ===================  (2 ตัวโต๊ด) =====================
    txt += `
            <tr>
               <td>
                  <span class="text_sky"> (2 ตัวโต๊ด) </span>
               </td>`;
    txt += td_(num_2toad, 'num_2toad', level, status_line);
    txt += `</tr>`
        // ==========================  (1 ตัวบน)	 ===================
    txt += `
            <tr>
               <td>
                  <span class="text_sky"> (1 ตัวบน) </span>
               </td> `;
    txt += td_(num_1upper, 'num_1upper', level, status_line);
    txt += `</tr>`
        // ===================== (1 ตัวล่าง) ========================
    txt += `
            <tr>
               <td>
                  <span class="text_sky"> (1 ตัวล่าง) </span>
               </td> `;
    txt += td_(num_1under, 'num_1under', level, status_line);
    txt += `</tr>`
        // ========================== (ปักหลักร้อย) ===================
    txt += `
            <tr>
               <td>
                  <span class="text_sky"> (ปักหลักร้อย) </span>
               </td> `;
    txt += td_(num_hundreds, 'num_hundreds', level, status_line);
    txt += `</tr>`
        // ========================= (ปักหลักสิบ)	 ====================
    txt += `
            <tr>
               <td>
                  <span class="text_sky"> (ปักหลักสิบ) </span>
               </td>`;
    txt += td_(num_tens, 'num_tens', level, status_line);
    txt += `</tr>`
        // ====================== (ปักหลักหน่วย) ===================
    txt += `
            <tr>
               <td>
                  <span class="text_sky"> (ปักหลักหน่วย) </span>
               </td> `;
    txt += td_(num_ones, 'num_ones', level, status_line);
    txt += `</tr>`
        // ==================== (4 ตัวบน) =================
    txt += `
            <tr>
               <td>
                  <span class="text_sky"> (4 ตัวบน) </span>
               </td>`;
    txt += td_(num_4upper, 'num_4upper', level, status_line);
    txt += `</tr>`
        // ======================= (4 ตัวโต๊ด) ================
    txt += `
            <tr>
               <td>
                  <span class="text_sky"> (4 ตัวโต๊ด) </span>
               </td>`;
    txt += td_(num_4toad, 'num_4toad', level, status_line);
    txt += `</tr>`
        // ====================  (5 ตัวโต๊ด) =================
    txt += `
            <tr>
               <td>
                  <span class="text_sky"> (5 ตัวโต๊ด) </span>
               </td>`;
    txt += td_(num_5toad, 'num_5toad', level, status_line);
    txt += `</tr>`
        // ---------------------------------------

    txt += `</tbody>
       </table>
    </div>
    `;
    return txt;
}

function td_(data, name, level, status_line) {
    var txt = `
      <td>
         <input type="number" name="minPerbet_` + name + `" id="minPerbet_` + name + `" size="6" value="` + data.minPerbet + `" style="text-align:right;width:50px" onkeyup="return " onkeypress="return checkNumber();" maxlength="4">
      </td>
      <td>
         <input name="txtMaxbet1_1" type="number" id="txtMaxbet1_1" size="12" value="` + data.maxPerbet + `" style="text-align:right;width:70px" onkeyup="return " onkeypress="return checkNumber();" maxlength="6">
      </td>
      <td>
         <input name="txtMaxnumber1_1" type="number" id="txtMaxnumber1_1" size="12" value="` + data.numPerbet + `" style="text-align:right;width:70px" onkeyup="return " onkeypress="return checkNumber();" maxlength="7">
      </td>`;
    txt += `<td>`;
    if (status_line.A == 1) {
        txt += `
         <div id="divCommRwA1_1" style="">
            คอม 
            <select name="pt_commA1_1" id="pt_commA1_1" style="WIDTH: 50px">`;
        for (let index = data.commission.A; index >= 0; index--) {
            txt += `<option value="` + index + `">` + index + `</option>`;

        }

        txt += `</select>
            <p>อัตราจ่าย</p>
            <input class="" name="txtRewardA1_1" type="number" id="txtRewardA1_1" size="6" value="` + data.Reward.LINE_A1.Reward + `" style="text-align:right;width:50px" onkeyup="return " onkeypress="return checkNumber();" maxlength="4">
            <input class="" name="" type="number" id="txtRewardA1_2" size="6" value="` + data.Reward.LINE_A2.Reward + `" style="text-align:right;width:50px" onkeyup="return " onkeypress="return checkNumber();" maxlength="4">
            <input class="" name="" type="number" id="txtRewardA1_3" size="6" value="` + data.Reward.LINE_A3.Reward + `" style="text-align:right;width:50px" onkeyup="return " onkeypress="return checkNumber();" maxlength="4">
            <input class="" name="" type="number" id="txtRewardA1_4" size="6" value="` + data.Reward.LINE_A4.Reward + `" style="text-align:right;width:50px" onkeyup="return " onkeypress="return checkNumber();" maxlength="4">
            <input class="" name="" type="number" id="txtRewardA1_5" size="6" value="` + data.Reward.LINE_A5.Reward + `" style="text-align:right;width:50px" onkeyup="return " onkeypress="return checkNumber();" maxlength="4">
         </div>`;

    }
    txt += `</td>`;
    txt += `<td>`;
    if (status_line.B == 1) {
        txt += `
         <div id="divCommRwB1_1" style="display: inline;">
            คอม
            <select name="pt_commB1_1" id="pt_commB1_1" style="WIDTH: 50px">`;
        for (let index = data.commission.B; index >= 0; index--) {
            txt += `<option value="` + index + `">` + index + `</option>`;

        }
        txt += `</select>
            <p>อัตราจ่าย</p>
            <input class="" name="txtRewardB1_1" type="number" id="txtRewardB1_1" size="6" value="` + data.Reward.LINE_B1.Reward + `" style="text-align:right;width:50px" onkeyup="return " onkeypress="return checkNumber();" maxlength="4">
            <input class="" name="" type="number" id="txtRewardB1_2" size="6" value="` + data.Reward.LINE_B2.Reward + `" style="text-align:right;width:50px" onkeyup="return " onkeypress="return checkNumber();" maxlength="4">
            <input class="" name="" type="number" id="txtRewardB1_3" size="6" value="` + data.Reward.LINE_B3.Reward + `" style="text-align:right;width:50px" onkeyup="return " onkeypress="return checkNumber();" maxlength="4">
            <input class="" name="" type="number" id="txtRewardB1_4" size="6" value="` + data.Reward.LINE_B4.Reward + `" style="text-align:right;width:50px" onkeyup="return " onkeypress="return checkNumber();" maxlength="4">
            <input class="" name="" type="number" id="txtRewardB1_5" size="6" value="` + data.Reward.LINE_B5.Reward + `" style="text-align:right;width:50px" onkeyup="return " onkeypress="return checkNumber();" maxlength="4">
         </div>`;
    }
    txt += `</td>`;
    txt += `<td>`;
    if (status_line.C == 1) {
        txt += `
         <div id="divCommRwC1_1" style="display: inline;">
            คอม 
            <select name="pt_commC1_1" id="pt_commC1_1" style="WIDTH: 50px">`;
        for (let index = data.commission.C; index >= 0; index--) {
            txt += `<option value="` + index + `">` + index + `</option>`;

        }
        txt += `</select>
            <p>อัตราจ่าย</p>
            <input class="" name="txtRewardC1_1" type="number" id="txtRewardC1_1" size="6" value="` + data.Reward.LINE_C1.Reward + `" style="text-align:right;width:50px" onkeyup="return " onkeypress="return checkNumber();" maxlength="4">
            <input class="" name="" type="number" id="txtRewardC1_2" size="6" value="` + data.Reward.LINE_C2.Reward + `" style="text-align:right;width:50px" onkeyup="return " onkeypress="return checkNumber();" maxlength="4">
            <input class="" name="" type="number" id="txtRewardC1_3" size="6" value="` + data.Reward.LINE_C3.Reward + `" style="text-align:right;width:50px" onkeyup="return " onkeypress="return checkNumber();" maxlength="4">
            <input class="" name="" type="number" id="txtRewardC1_4" size="6" value="` + data.Reward.LINE_C4.Reward + `" style="text-align:right;width:50px" onkeyup="return " onkeypress="return checkNumber();" maxlength="4">
            <input class="" name="" type="number" id="txtRewardC1_5" size="6" value="` + data.Reward.LINE_C5.Reward + `" style="text-align:right;width:50px" onkeyup="return " onkeypress="return checkNumber();" maxlength="4">
         </div>`;
    }
    txt += `</td>`;
    switch (level) {
        case "1":
            txt += `
              <td>
                 <span id="parentPercent_` + name + `">
                  ` + data.percent.Percent + `
                 </span>
              </td>
              <td>
                 <select name="ddl_target1_1" id="ddl_target1_1" style="width: 50px;">`;
            for (let index = data.percent.Percent; index >= 0; index--) {
                txt += `<option value="` + index + `">` + index + `</option>`;

            }
            txt += `</select>
              </td>
              <td>
                 <input type="checkbox" name="takeSH1_1" id="takeSH1_1" value="1" ">
              </td>
              `;
            break;
        case "2":
            txt += `
              <td>
                 <span id="parentPercent_` + name + `">
                  ` + data.percent.Percent + `
                 </span>
              </td>
              <td>
              <select name="ddl_target1_1" id="ddl_target1_1" style="width: 50px;">`;
            for (let index = data.percent.Percent; index >= 0; index--) {
                txt += `<option value="` + index + `">` + index + `</option>`;

            }
            txt += `</select>
              </td>
              <td>
                 <input type="checkbox" name="takeSH1_1" id="takeSH1_1" value="1" ">
              </td>
              `;
            break;
        case "3":
            txt += `
              <td>
                 <span id="parentPercent_` + name + `">
                  ` + data.percent.Percent + `
                 </span>
              </td>
              <td>
              <select name="ddl_target1_1" id="ddl_target1_1" style="width: 50px;">`;
            for (let index = data.percent.Percent; index >= 0; index--) {
                txt += `<option value="` + index + `">` + index + `</option>`;

            }
            txt += `</select>
              </td>
              <td>
                 <input type="checkbox" name="takeSH1_1" id="takeSH1_1" value="1" ">
              </td>
              `;
            break;
        case "4":
            txt += `
              <td>
                 <span id="parentPercent_` + name + `">
                  ` + data.percent.Percent + `
                 </span>
              </td>
              <td>
              <select name="ddl_target1_1" id="ddl_target1_1" style="width: 50px;">`;
            for (let index = data.percent.Percent; index >= 0; index--) {
                txt += `<option value="` + index + `">` + index + `</option>`;

            }
            txt += `</select>
              </td>
              <td>
                 <input type="checkbox" name="takeSH1_1" id="takeSH1_1" value="1" ">
              </td>
              `;
            break;
        case "5":
            txt += `
              <td>
                 <span id="parentPercent_` + name + `">
                  ` + data.percent.Percent + `
                 </span>
              </td>
              <td>
              <select name="ddl_target1_1" id="ddl_target1_1" style="width: 50px;">`;
            for (let index = data.percent.Percent; index >= 0; index--) {
                txt += `<option value="` + index + `">` + index + `</option>`;

            }
            txt += `</select>
              </td>
              <td>
                 <input type="checkbox" name="takeSH1_1" id="takeSH1_1" value="1" ">
              </td>
              `;
            break;
        case "6":
            txt += `
              <td>
                 <span id="parentPercent_` + name + `">
                  ` + data.percent.Percent + `
                 </span>
              </td>
              <td>
              <select name="ddl_target1_1" id="ddl_target1_1" style="width: 50px;">`;
            for (let index = data.percent.Percent; index >= 0; index--) {
                txt += `<option value="` + index + `">` + index + `</option>`;

            }
            txt += `</select>
              </td>
              <td>
                 <input type="checkbox" name="takeSH1_1" id="takeSH1_1" value="1" ">
              </td>
              `;
            break;
        case "7":
            txt += `
              <td>
                 <span id="parentPercent_` + name + `">
                  ` + data.percent.Percent + `
                 </span>
              </td>
              <td>
              <select name="ddl_target1_1" id="ddl_target1_1" style="width: 50px;">`;
            for (let index = data.percent.Percent; index >= 0; index--) {
                txt += `<option value="` + index + `">` + index + `</option>`;

            }
            txt += `</select>
              </td>
              <td>
                 <input type="checkbox" name="takeSH1_1" id="takeSH1_1" value="1" ">
              </td>
              `;
            break;
        case "8":
            txt += `
              <td>
                 <span id="parentPercent_` + name + `">
                  ` + data.percent.Percent + `
                 </span>
              </td>
              <td>
             
              </td>
              <td> </td>
              `;
            break;
    }
    return txt;
}