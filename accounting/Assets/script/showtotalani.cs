using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;
using UnityEngine.SceneManagement;

public class showtotalani : MonoBehaviour {
    public GameObject fullpanel;
    public Text text;
    IEnumerator ShowAniTotal()
    {
        WWWForm form = new WWWForm();//上傳unity使用者所輸入的資料
        form.AddField("userid", Savedata.id);
        form.AddField("chick", Savedata.chick_stock);
        form.AddField("pig", Savedata.pig_stock);
        form.AddField("ox", Savedata.ox_stock);
        WWW www = new WWW("http://163.17.135.213/accounting/ConToComeOut.php", form);
        yield return www;
        string b;
        b = www.text;
        print(b);
        
        string[] animal = b.Split(',');
        int i = 0;
        for (i= 0;i<animal.Length;i++)
        {
            Savedata.animal[i] = animal[i];
            print("the animal id are :" + Savedata.animal[i] + " ");
        }
       
    }
    public void check()
    {
        int i = 0;
        for (i = 0; i < 5; i++)
        {
            if (Savedata.animal[i] == "")
            {
                fullpanel.SetActive(true);
                StartCoroutine(ShowAniTotal());
                text.text = "新增成功";
                SceneManager.LoadScene("farm");
            }
            else
            {
                fullpanel.SetActive(true);
                text.text = "農場空間不足";
            }
        }
        
      
    }
    public void close()
    {
        fullpanel.SetActive(false);
    }
    // Use this for initialization
    void Start () {
		
	}
	
	// Update is called once per frame
	void Update () {
		
	}
}
