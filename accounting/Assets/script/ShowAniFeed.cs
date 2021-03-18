using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class ShowAniFeed : MonoBehaviour {
    public Text[] msg = new Text[5];
    // Use this for initialization
    void Start () {
        
    }
	
	// Update is called once per frame
	void Update () {
		
	}
   public IEnumerator SelectAniFeed(string aniID, string id, int i)
    {
        WWWForm form = new WWWForm();//上傳unity使用者所輸入的資料
        form.AddField("action", "selectAni");
        form.AddField("ani1", aniID);
        form.AddField("userid", id);

        WWW www = new WWW("http://163.17.135.213/accounting/Feedtoani.php", form);
        yield return www;
        
        string b = www.text;
        msg[i].text = "" + b;


        //  Thread.Sleep(7000); //Delay 7秒
    }
}
