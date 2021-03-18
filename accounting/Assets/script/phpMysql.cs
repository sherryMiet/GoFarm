using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;
using UnityEngine.SceneManagement;

public class phpMysql : MonoBehaviour {

    public InputField userNameField;//登入帳號
    public InputField passWordField;//登入密碼
    public Text feedbackmsg;//實時返回狀態文字
   

    public void isLoad()
    {
       Savedata.email = userNameField.text;
       Savedata.password = passWordField.text;

        StartCoroutine(LoginToDB(Savedata.email, Savedata.password));
        StartCoroutine(FindID(Savedata.email, Savedata.password));
    }
    IEnumerator LoginToDB(string username, string password)
    {
        WWWForm form = new WWWForm();//上傳unity使用者所輸入的資料
        form.AddField("userid", username);
        form.AddField("userpassword", password);
      
        WWW www = new WWW("http://163.17.135.213/accounting/connection.php", form);//下載connection.php所回傳的資訊
     
        yield return www;
     
        int a=int.Parse(www.text);
        print(www.text);
        if (a == 1)
        {
            SceneManager.LoadScene("farm");
        }
        else
        { 
            feedbackmsg.CrossFadeAlpha(100f, 0f, false);
            feedbackmsg.color = Color.red;
            feedbackmsg.text = "登入錯誤";
        }
        if (www.error != null)
        {
            print("error:"+www.error);
            yield return null;
        }
      
    }
    IEnumerator FindID(string username, string password)
    {
        WWWForm form = new WWWForm();//上傳unity使用者所輸入的資料
        form.AddField("userid", username);
        form.AddField("userpassword", password);

        WWW www = new WWW("http://163.17.135.213/accounting/findid.php", form);//下載connection.php所回傳的資訊

        yield return www;
        
        string b = www.text;
        b = b.Replace(" ", "");
        b = b.Replace("\r", "");
        b = b.Replace("\n", "");
        b = b.Replace("\t", "");
        b = b.Replace("</br>", "");
        Savedata.id = b;
        
    }


    // Use this for initialization
    void Start () {
		
	}
	
	// Update is called once per frame
	void Update () {
		
	}
}
